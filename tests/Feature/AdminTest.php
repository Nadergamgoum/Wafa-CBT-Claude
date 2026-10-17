<?php

namespace Tests\Feature;

use App\Filament\Auth\Login;
use App\Filament\Pages\SiteSettings;
use App\Filament\Resources\Pages\Pages\EditPage;
use App\Filament\Resources\Services\Pages\EditService;
use App\Filament\Resources\TrainingPrograms\Pages\EditTrainingProgram;
use App\Models\Page;
use App\Models\Service;
use App\Models\Setting;
use App\Models\TrainingProgram;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected User $editor;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seedContent();
        $this->admin = User::factory()->create(['username' => 'boss', 'email' => 'boss@example.com', 'role' => 'super_admin', 'password' => 'Str0ng-Passw0rd!']);
        $this->editor = User::factory()->create(['username' => 'writer', 'role' => 'editor']);
        Filament::setCurrentPanel(Filament::getPanel('admin'));
    }

    public function test_guests_are_redirected_to_login(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
        $this->get('/admin/login')->assertOk();
    }

    public function test_login_accepts_username_or_email(): void
    {
        Livewire::test(Login::class)->set('data.login', 'boss')->set('data.password', 'Str0ng-Passw0rd!')->call('authenticate')->assertHasNoErrors();
        $this->assertAuthenticatedAs($this->admin);
        auth()->logout();
        Livewire::test(Login::class)->set('data.login', 'boss@example.com')->set('data.password', 'Str0ng-Passw0rd!')->call('authenticate')->assertHasNoErrors();
        $this->assertAuthenticatedAs($this->admin);
        $this->assertNotNull($this->admin->fresh()->last_login_at);
    }

    public function test_wrong_password_and_inactive_users_are_rejected(): void
    {
        Livewire::test(Login::class)->set('data.login', 'boss')->set('data.password', 'wrong')->call('authenticate')->assertHasErrors(['data.login']);
        $this->admin->update(['is_active' => false]);
        Livewire::test(Login::class)->set('data.login', 'boss')->set('data.password', 'Str0ng-Passw0rd!')->call('authenticate')->assertHasErrors(['data.login']);
        $this->assertGuest();
    }

    public function test_super_admin_can_reach_every_section(): void
    {
        $this->actingAs($this->admin);
        foreach (['/admin', '/admin/pages', '/admin/services', '/admin/service-categories', '/admin/training-programs', '/admin/posts',
            '/admin/faqs', '/admin/media', '/admin/menus', '/admin/leads', '/admin/redirects', '/admin/users', '/admin/site-settings',
            '/admin/seo-audit', '/admin/team-members', '/admin/testimonials', '/admin/profile'] as $url) {
            $this->get($url)->assertOk();
        }
    }

    public function test_editor_manages_content_but_not_users_settings_or_redirects(): void
    {
        $this->actingAs($this->editor);
        foreach (['/admin/pages', '/admin/services', '/admin/posts', '/admin/media', '/admin/faqs', '/admin/menus'] as $url) {
            $this->get($url)->assertOk();
        }
        foreach (['/admin/users', '/admin/site-settings', '/admin/redirects'] as $url) {
            $this->get($url)->assertForbidden();
        }
    }

    public function test_saving_services_without_changes_preserves_all_content(): void
    {
        $this->actingAs($this->admin);
        foreach (Service::all() as $service) {
            $before = $service->fresh()->only(['title', 'hero', 'sections', 'seo']);
            Livewire::test(EditService::class, ['record' => $service->getKey()])->call('save')->assertHasNoErrors();
            $after = $service->fresh()->only(['title', 'hero', 'sections', 'seo']);
            $this->assertEquals($this->normalize($before), $this->normalize($after), "Round-trip changed {$service->slug}");
        }
    }

    public function test_saving_pages_and_programs_without_changes_preserves_content(): void
    {
        $this->actingAs($this->admin);
        foreach (Page::all() as $page) {
            $before = $page->fresh()->only(['title', 'intro', 'sections']);
            Livewire::test(EditPage::class, ['record' => $page->getKey()])->call('save')->assertHasNoErrors();
            $this->assertEquals($this->normalize($before), $this->normalize($page->fresh()->only(['title', 'intro', 'sections'])), "Round-trip changed page {$page->key}");
        }
        $program = TrainingProgram::first();
        $before = $program->only(['title', 'outcomes', 'agenda']);
        Livewire::test(EditTrainingProgram::class, ['record' => $program->getKey()])->call('save')->assertHasNoErrors();
        $this->assertEquals($this->normalize($before), $this->normalize($program->fresh()->only(['title', 'outcomes', 'agenda'])));
    }

    public function test_settings_page_saves_contact_details(): void
    {
        $this->actingAs($this->admin);
        Livewire::test(SiteSettings::class)
            ->set('data.contact.phone', '+971 4 123 4567')
            ->set('data.whatsapp.enabled', true)
            ->set('data.whatsapp.country_code', '971')
            ->set('data.whatsapp.number', '501234567')
            ->set('data.analytics.google_verification', '<meta name="google-site-verification" content="abc123XYZ" />')
            ->call('save')->assertHasNoErrors();
        Setting::flush();
        $this->assertSame('+971 4 123 4567', setting('contact.phone'));
        $this->assertSame('abc123XYZ', setting('analytics.google_verification'));
        $this->get('/')->assertSee('https://wa.me/971501234567', false)->assertSee('content="abc123XYZ"', false);
    }

    /** Ignores ordering of keys and empty values introduced by form defaults. */
    protected function normalize(mixed $value): mixed
    {
        if (is_array($value)) {
            $out = [];
            foreach ($value as $k => $v) {
                $n = $this->normalize($v);
                if ($n === null || $n === '' || $n === []) {
                    continue;
                }
                $out[$k] = $n;
            }
            if (! array_is_list($out)) {
                ksort($out);
            }

            return $out;
        }

        return is_string($value) ? trim(preg_replace('/>\s+</', '><', $value)) : $value;
    }
}
