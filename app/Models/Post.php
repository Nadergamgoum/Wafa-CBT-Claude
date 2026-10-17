<?php

namespace App\Models;

use App\Models\Concerns\HasSeo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasSeo;

    protected $fillable = ['post_category_id', 'author_id', 'author_name', 'slug', 'title', 'excerpt', 'body', 'image_id',
        'tags', 'published_at', 'seo', 'is_featured', 'is_published'];

    protected $casts = ['author_name' => 'array', 'title' => 'array', 'excerpt' => 'array', 'body' => 'array',
        'tags' => 'array', 'seo' => 'array', 'published_at' => 'datetime', 'is_featured' => 'boolean', 'is_published' => 'boolean'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(TeamMember::class, 'author_id');
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    public function scopeLive(Builder $query): Builder
    {
        return $query->where('is_published', true)->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function url(?string $locale = null): string
    {
        return lroute('insights.show', ['post' => $this->slug], $locale);
    }

    public function readingMinutes(?string $locale = null): int
    {
        $text = strip_tags(t($this->body, $locale));
        $words = count(preg_split('/\s+/u', trim($text), -1, PREG_SPLIT_NO_EMPTY));

        return max(1, (int) ceil($words / 200));
    }

    public function authorLabel(): string
    {
        return $this->author ? t($this->author->name) : (t($this->author_name) ?: __('site.editorial_team'));
    }

    /** Tags for the current locale (stored as {"en": [...], "ar": [...]}). */
    public function tagList(): array
    {
        return tl($this->tags);
    }
}
