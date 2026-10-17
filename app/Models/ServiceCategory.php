<?php

namespace App\Models;

use App\Models\Concerns\HasSeo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceCategory extends Model
{
    use HasSeo;

    protected $fillable = ['key', 'slug', 'title', 'nav_title', 'summary', 'hero', 'image_id', 'sections', 'seo', 'sort', 'is_published'];

    protected $casts = ['title' => 'array', 'nav_title' => 'array', 'summary' => 'array', 'hero' => 'array', 'sections' => 'array', 'seo' => 'array', 'is_published' => 'boolean'];

    public function services(): HasMany
    {
        return $this->hasMany(Service::class)->orderBy('sort');
    }

    public function publishedServices(): HasMany
    {
        return $this->services()->where('is_published', true);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    public function url(?string $locale = null): string
    {
        return lroute('page', ['slug' => $this->slug], $locale);
    }

    public function navLabel(): string
    {
        return t($this->nav_title) ?: t($this->title);
    }
}
