<?php

namespace App\Models;

use App\Models\Concerns\HasSeo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasSeo;

    public const TEMPLATES = [
        'home' => 'Homepage',
        'about' => 'About',
        'contact' => 'Contact',
        'insights' => 'Insights listing',
        'programs' => 'Training programs listing',
        'engagements' => 'Corporate engagements listing',
        'legal' => 'Legal / policy text',
        'generic' => 'Generic content page',
    ];

    protected $fillable = ['key', 'slug', 'template', 'title', 'intro', 'hero_image_id', 'sections', 'seo', 'is_published', 'sort'];

    protected $casts = ['title' => 'array', 'intro' => 'array', 'sections' => 'array', 'seo' => 'array', 'is_published' => 'boolean'];

    public function heroImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'hero_image_id');
    }

    public static function byKey(string $key): ?self
    {
        return static::query()->where('key', $key)->first();
    }

    public function url(?string $locale = null): string
    {
        return match ($this->key) {
            'home' => lroute('home', [], $locale),
            'about' => lroute('about', [], $locale),
            'contact' => lroute('contact', [], $locale),
            'insights' => lroute('insights.index', [], $locale),
            'programs' => lroute('programs.index', [], $locale),
            'engagements' => lroute('engagements.index', [], $locale),
            default => lroute('page', ['slug' => $this->slug], $locale),
        };
    }
}
