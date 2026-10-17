<?php

namespace App\Support;

use App\Models\Engagement;
use App\Models\Faq;
use App\Models\Post;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\TrainingProgram;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * Read-side queries shared by layouts and blocks, memoised per request.
 * Eloquent models are deliberately not written to the persistent cache
 * (cache.serializable_classes = false guards against gadget chains); the
 * version number is still bumped on every CMS save so string caches such
 * as the sitemap are invalidated.
 */
class Content
{
    protected static array $memo = [];

    public static function version(): int
    {
        return (int) Cache::rememberForever('content.version', fn () => 1);
    }

    public static function bust(): void
    {
        Cache::forever('content.version', static::version() + 1);
        Cache::forget('wafa.menus');
        static::$memo = [];
    }

    protected static function remember(string $key, \Closure $callback): mixed
    {
        return static::$memo[$key] ??= $callback();
    }

    /** @return Collection<int, ServiceCategory> */
    public static function categories(): Collection
    {
        return static::remember('categories', fn () => ServiceCategory::query()
            ->where('is_published', true)->orderBy('sort')
            ->with(['publishedServices' => fn ($q) => $q->with(['cardImage', 'category'])])
            ->get());
    }

    public static function category(string $key): ?ServiceCategory
    {
        return static::categories()->firstWhere('key', $key);
    }

    /** @return Collection<int, Service> */
    public static function services(): Collection
    {
        return static::categories()->flatMap(fn ($c) => $c->publishedServices);
    }

    public static function serviceByFamily(string $family): ?Service
    {
        return static::services()->firstWhere('family', $family);
    }

    /** @return Collection<int, Service> */
    public static function servicesByIds(?array $ids): Collection
    {
        $all = static::services();
        if (empty($ids)) {
            return collect();
        }

        return collect($ids)->map(fn ($id) => $all->firstWhere('id', (int) $id))->filter()->values();
    }

    public static function programs(int $limit = 6): Collection
    {
        return static::remember('programs.'.$limit, fn () => TrainingProgram::query()->where('is_published', true)
            ->with(['category', 'image'])->orderByDesc('is_featured')->orderBy('sort')->limit($limit)->get());
    }

    public static function posts(int $limit = 4, ?int $exceptId = null): Collection
    {
        return static::remember('posts.'.$limit.'.'.$exceptId, fn () => Post::query()->live()
            ->when($exceptId, fn ($q) => $q->where('id', '!=', $exceptId))
            ->with(['category', 'image', 'author'])->orderByDesc('is_featured')->orderByDesc('published_at')->limit($limit)->get());
    }

    public static function homeFaqs(): Collection
    {
        return static::remember('faqs.home', fn () => Faq::query()->where('is_published', true)->where('show_on_home', true)->orderBy('sort')->get());
    }

    public static function faqsForService(int $serviceId): Collection
    {
        return static::remember('faqs.service.'.$serviceId, fn () => Faq::query()->where('is_published', true)->where('service_id', $serviceId)->orderBy('sort')->get());
    }

    public static function faqsForTopic(string $topic): Collection
    {
        return static::remember('faqs.topic.'.$topic, fn () => Faq::query()->where('is_published', true)->where('topic', $topic)->whereNull('service_id')->orderBy('sort')->get());
    }

    public static function testimonials(): Collection
    {
        return static::remember('testimonials', fn () => Testimonial::query()->where('is_published', true)->orderBy('sort')->get());
    }

    public static function team(): Collection
    {
        return static::remember('team', fn () => TeamMember::query()->where('is_published', true)->with('photo')->orderBy('sort')->get());
    }

    public static function engagements(int $limit = 6): Collection
    {
        return static::remember('engagements.'.$limit, fn () => Engagement::query()->where('is_published', true)
            ->with('image')->orderByDesc('is_featured')->orderBy('sort')->orderByDesc('event_date')->limit($limit)->get());
    }
}
