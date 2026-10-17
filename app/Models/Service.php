<?php

namespace App\Models;

use App\Models\Concerns\HasSeo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasSeo;

    /** Service families drive the page structure and visual rhythm. */
    public const FAMILIES = [
        'medical' => 'Medical insurance (flagship)',
        'life' => 'Life insurance',
        'auto' => 'Auto insurance',
        'property' => 'Property insurance',
        'hr' => 'HR consulting',
        'od' => 'Organizational development',
        'training' => 'Training',
        'business_coaching' => 'Business coaching',
        'executive_coaching' => 'Executive coaching',
    ];

    public const HERO_VARIANTS = [
        'layered' => 'Layered composition (image with floating cards)',
        'editorial' => 'Full-width editorial image',
        'asymmetric' => 'Asymmetric split',
        'overlay' => 'Image background with controlled overlay',
        'diagram' => 'Text-led with diagram',
        'minimal' => 'Premium minimal',
        'learning' => 'Learning split with highlights',
        'dark' => 'Dark premium',
        'growth' => 'Growth split with chart motif',
    ];

    public const ACCENTS = [
        'teal' => 'Teal (health)',
        'navy' => 'Navy',
        'sky' => 'Sky',
        'amber' => 'Amber',
        'sage' => 'Sage',
        'plum' => 'Plum',
        'gold' => 'Gold',
    ];

    protected $fillable = ['service_category_id', 'family', 'slug', 'title', 'nav_title', 'summary', 'hero', 'hero_variant',
        'hero_image_id', 'secondary_image_id', 'card_image_id', 'illustration', 'accent', 'icon', 'sections', 'seo',
        'is_featured', 'is_published', 'sort'];

    protected $casts = ['title' => 'array', 'nav_title' => 'array', 'summary' => 'array', 'hero' => 'array',
        'sections' => 'array', 'seo' => 'array', 'is_featured' => 'boolean', 'is_published' => 'boolean'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function heroImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'hero_image_id');
    }

    public function secondaryImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'secondary_image_id');
    }

    public function cardImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'card_image_id');
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class)->where('is_published', true)->orderBy('sort');
    }

    public function url(?string $locale = null): string
    {
        return lroute('service', ['category' => $this->category->slug, 'service' => $this->slug], $locale);
    }

    public function navLabel(): string
    {
        return t($this->nav_title) ?: t($this->title);
    }

    /** Built-in editorial artwork used until a photograph is uploaded. */
    public function artUrl(string $kind = 'hero'): string
    {
        $key = $this->illustration ?: $this->family;

        return asset('images/art/'.$key.($kind === 'hero' ? '' : '-'.$kind).'.svg');
    }
}
