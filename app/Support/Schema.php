<?php

namespace App\Support;

use App\Models\Post;
use App\Models\Service;
use App\Models\TrainingProgram;
use Illuminate\Support\Collection;

/** JSON-LD builders (schema.org). Only configured, factual values are emitted. */
class Schema
{
    public static function organization(): array
    {
        $node = [
            '@type' => ['Organization', 'ProfessionalService'],
            '@id' => url('/').'#organization',
            'name' => t(setting('general.site_name')) ?: 'WAFA',
            'url' => url('/'),
        ];
        if ($legal = t(setting('general.legal_name'))) {
            $node['legalName'] = $legal;
        }
        if ($logo = Brand::logoUrl()) {
            $node['logo'] = $logo;
            $node['image'] = $logo;
        }
        if ($desc = t(setting('seo.default_description'))) {
            $node['description'] = $desc;
        }
        if ($phone = Contact::phone()) {
            $node['telephone'] = $phone;
        }
        if ($email = Contact::email()) {
            $node['email'] = $email;
        }
        $address = array_filter([
            'streetAddress' => t(setting('contact.street')),
            'addressLocality' => t(setting('contact.city')),
            'addressRegion' => t(setting('contact.region')),
            'postalCode' => setting('contact.postal_code'),
            'addressCountry' => setting('contact.country_code'),
        ]);
        if ($address) {
            $node['address'] = ['@type' => 'PostalAddress'] + $address;
        }
        if ($social = array_column(Contact::social(), 'url')) {
            $node['sameAs'] = $social;
        }
        $node['areaServed'] = setting('contact.area_served') ?: null;
        $node['knowsAbout'] = ['Corporate medical insurance', 'Employee health benefits', 'Insurance brokerage', 'Life insurance',
            'Auto insurance', 'Property insurance', 'HR consulting', 'Organizational development', 'Training', 'Business coaching', 'Executive coaching'];

        return array_filter($node, fn ($v) => $v !== null);
    }

    public static function website(): array
    {
        return [
            '@type' => 'WebSite',
            '@id' => url('/').'#website',
            'url' => url('/'),
            'name' => t(setting('general.site_name')) ?: 'WAFA',
            'inLanguage' => ['en', 'ar'],
            'publisher' => ['@id' => url('/').'#organization'],
        ];
    }

    public static function service(Service $service): array
    {
        return [
            '@type' => 'Service',
            'name' => t($service->title),
            'description' => t($service->summary),
            'serviceType' => t($service->category?->title),
            'url' => $service->url(),
            'provider' => ['@id' => url('/').'#organization'],
            'inLanguage' => app()->getLocale(),
        ];
    }

    public static function faq(Collection|array $faqs): ?array
    {
        $entities = collect($faqs)->map(fn ($f) => [
            '@type' => 'Question',
            'name' => is_array($f) ? $f['q'] : t($f->question),
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags(is_array($f) ? $f['a'] : t($f->answer))],
        ])->filter(fn ($e) => $e['name'] !== '')->values()->all();

        return $entities ? ['@type' => 'FAQPage', 'mainEntity' => $entities] : null;
    }

    public static function article(Post $post): array
    {
        return array_filter([
            '@type' => 'Article',
            'headline' => t($post->title),
            'description' => t($post->excerpt),
            'image' => $post->image?->url(1200),
            'datePublished' => $post->published_at?->toIso8601String(),
            'dateModified' => $post->updated_at?->toIso8601String(),
            'author' => ['@type' => $post->author ? 'Person' : 'Organization', 'name' => $post->authorLabel()],
            'publisher' => ['@id' => url('/').'#organization'],
            'mainEntityOfPage' => $post->url(),
            'inLanguage' => app()->getLocale(),
            'keywords' => implode(', ', $post->tagList()) ?: null,
        ]);
    }

    public static function course(TrainingProgram $program): array
    {
        $course = [
            '@type' => 'Course',
            'name' => t($program->title),
            'description' => t($program->summary) ?: strip_tags(t($program->description)),
            'url' => $program->url(),
            'provider' => ['@id' => url('/').'#organization'],
            'inLanguage' => app()->getLocale(),
        ];
        if ($program->starts_at) {
            $instance = ['@type' => 'CourseInstance', 'startDate' => $program->starts_at->toDateString()];
            if ($program->ends_at) {
                $instance['endDate'] = $program->ends_at->toDateString();
            }
            $instance['courseMode'] = match ($program->delivery_mode) {
                'online' => 'online', 'blended' => 'blended', default => 'onsite',
            };
            if ($loc = t($program->location)) {
                $instance['location'] = $loc;
            }
            $course['hasCourseInstance'] = [$instance];
        }

        return $course;
    }

    public static function breadcrumbs(array $crumbs): ?array
    {
        if (count($crumbs) < 2) {
            return null;
        }

        return [
            '@type' => 'BreadcrumbList',
            'itemListElement' => collect($crumbs)->values()->map(fn ($c, $i) => array_filter([
                '@type' => 'ListItem', 'position' => $i + 1, 'name' => $c[0], 'item' => $c[1] ?? null,
            ]))->all(),
        ];
    }

    public static function graph(array $nodes): string
    {
        $nodes = array_values(array_filter($nodes));

        return json_encode(['@context' => 'https://schema.org', '@graph' => $nodes], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP);
    }
}
