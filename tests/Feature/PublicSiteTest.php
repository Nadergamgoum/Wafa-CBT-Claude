<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Service;
use App\Models\TrainingProgram;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PublicSiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seedContent();
    }

    public static function paths(): array
    {
        return [['/'], ['/about'], ['/contact'], ['/insights'], ['/training-programs'], ['/insurance'], ['/people-organization'],
            ['/learning-leadership'], ['/privacy-policy'], ['/terms-of-use'], ['/cookie-policy']];
    }

    #[DataProvider('paths')]
    public function test_core_pages_render_in_both_languages(string $path): void
    {
        foreach (['', '/ar'] as $prefix) {
            $url = rtrim($prefix.$path, '/') ?: '/';
            $html = $this->get($url)->assertOk()->getContent();
            $this->assertSame(1, substr_count($html, '<h1'), "Exactly one H1 expected on {$url}");
            $this->assertStringContainsString('hreflang="en"', $html);
            $this->assertStringContainsString('hreflang="ar"', $html);
            $this->assertStringContainsString('rel="canonical"', $html);
            $this->assertStringContainsString($prefix === '/ar' ? 'dir="rtl"' : 'dir="ltr"', $html);
        }
    }

    public function test_every_service_program_and_article_renders(): void
    {
        foreach (Service::with('category')->get() as $s) {
            foreach (['en', 'ar'] as $l) {
                $html = $this->get($s->url($l))->assertOk()->getContent();
                $this->assertSame(1, substr_count($html, '<h1'), $s->slug);
                $this->assertStringContainsString('"BreadcrumbList"', $html);
                $this->assertStringContainsString('"Service"', $html);
                $this->assertStringContainsString('svc--'.$s->family, $html);
            }
        }
        foreach (TrainingProgram::all() as $p) {
            $this->get($p->url('en'))->assertOk()->assertSee('"Course"', false);
            $this->get($p->url('ar'))->assertOk();
        }
        foreach (Post::all() as $p) {
            $this->get($p->url('en'))->assertOk()->assertSee('"Article"', false);
            $this->get($p->url('ar'))->assertOk();
        }
    }

    public function test_service_families_use_distinct_hero_layouts(): void
    {
        $variants = Service::pluck('hero_variant');
        $this->assertSame($variants->count(), $variants->unique()->count(), 'Each service family should use its own hero layout.');
    }

    public function test_medical_page_has_faq_schema_and_flagship_navigation(): void
    {
        $html = $this->get('/insurance/medical-insurance')->assertOk()->getContent();
        $this->assertStringContainsString('"FAQPage"', $html);
        $this->assertStringContainsString('class="onpage"', $html);
    }

    public function test_sitemap_lists_both_languages_with_alternates(): void
    {
        $xml = $this->get('/sitemap.xml')->assertOk()->assertHeader('Content-Type', 'application/xml; charset=UTF-8')->getContent();
        $doc = simplexml_load_string($xml);
        $this->assertNotFalse($doc);
        $this->assertStringContainsString('/ar/insurance/medical-insurance</loc>', $xml);
        $this->assertStringContainsString('hreflang="ar"', $xml);
        $this->assertStringNotContainsString('/admin', $xml);
    }

    public function test_robots_txt_references_sitemap_and_blocks_admin(): void
    {
        $this->get('/robots.txt')->assertOk()->assertSee('Disallow: /admin')->assertSee('Sitemap: '.url('/sitemap.xml'));
    }

    public function test_noindex_setting_blocks_robots_and_pages(): void
    {
        config(['app.force_noindex' => true]);
        $this->get('/robots.txt')->assertSee('Disallow: /');
        $this->get('/')->assertSee('noindex,follow', false);
    }

    public function test_unknown_page_returns_branded_404(): void
    {
        $this->get('/does-not-exist')->assertNotFound()->assertSee('Page not found');
        $this->get('/ar/does-not-exist')->assertNotFound()->assertSee('الصفحة غير موجودة');
    }

    public function test_legacy_urls_redirect_permanently(): void
    {
        $this->get('/about-us')->assertStatus(301)->assertRedirect(url('/about'));
        $this->get('/health-insurance/')->assertRedirect();
    }

    public function test_unconfigured_contact_channels_are_hidden(): void
    {
        $html = $this->get('/contact')->getContent();
        $this->assertStringNotContainsString('wa.me', $html);
        $this->assertStringNotContainsString('href="tel:', $html);
    }

    public function test_configured_whatsapp_and_phone_render(): void
    {
        \App\Models\Setting::put('whatsapp', ['enabled' => true, 'country_code' => '971', 'number' => '050 123 4567', 'message' => ['en' => 'Hi', 'ar' => 'مرحبا']]);
        \App\Models\Setting::put('contact', ['phone' => '+971 4 000 0000', 'email' => 'info@example.com']);
        $html = $this->get('/')->getContent();
        $this->assertStringContainsString('https://wa.me/971501234567?text=Hi', $html);
        $this->assertStringContainsString('href="tel:+97140000000"', $html);
        $this->assertStringContainsString('https://wa.me/971501234567?text=%D9%85%D8%B1%D8%AD%D8%A8%D8%A7', $this->get('/ar')->getContent());
    }

    public function test_tracking_scripts_only_configured_when_ids_exist(): void
    {
        $this->get('/')->assertDontSee('"ga4"', false);
        \App\Models\Setting::put('analytics', ['ga4_id' => 'G-ABC1234', 'gtm_id' => 'bad<script>']);
        $html = $this->get('/')->getContent();
        $this->assertStringContainsString('"ga4":"G-ABC1234"', $html);
        $this->assertStringNotContainsString('bad<script>', $html);
    }

    public function test_security_headers_are_present(): void
    {
        $res = $this->get('/');
        $res->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
            ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
        $this->assertStringContainsString("object-src 'none'", $res->headers->get('Content-Security-Policy'));
        $this->assertStringContainsString("frame-ancestors 'self'", $res->headers->get('Content-Security-Policy'));
    }

    public function test_first_party_beacon_records_pageviews_but_ignores_bots(): void
    {
        $this->postJson('/t', ['type' => 'pageview', 'path' => '/insurance'], ['User-Agent' => 'Mozilla/5.0 (iPhone)'])->assertNoContent();
        $this->postJson('/t', ['type' => 'pageview', 'path' => '/'], ['User-Agent' => 'Googlebot/2.1'])->assertNoContent();
        $this->postJson('/t', ['type' => 'event', 'name' => 'not_allowed', 'path' => '/'])->assertNoContent();
        $this->postJson('/t', ['type' => 'event', 'name' => 'whatsapp_click', 'path' => '/ar'], ['User-Agent' => 'Mozilla/5.0'])->assertNoContent();
        $this->assertDatabaseCount('analytics_events', 2);
        $this->assertDatabaseHas('analytics_events', ['path' => '/insurance', 'device' => 'mobile', 'locale' => 'en']);
        $this->assertDatabaseHas('analytics_events', ['name' => 'whatsapp_click', 'locale' => 'ar']);
    }
}
