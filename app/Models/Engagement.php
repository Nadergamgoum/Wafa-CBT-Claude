<?php

namespace App\Models;

use App\Models\Concerns\HasSeo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

/** Corporate engagement / event (e.g. team engagement sessions) with a photo gallery. */
class Engagement extends Model
{
    use HasSeo;

    protected $fillable = ['slug', 'title', 'event_date', 'summary', 'body', 'highlights', 'image_id', 'gallery', 'client_name',
        'client_approved', 'cta_label', 'cta_link', 'seo', 'is_featured', 'is_published', 'sort'];

    protected $casts = ['title' => 'array', 'summary' => 'array', 'body' => 'array', 'highlights' => 'array', 'gallery' => 'array',
        'client_name' => 'array', 'cta_label' => 'array', 'seo' => 'array', 'event_date' => 'date',
        'client_approved' => 'boolean', 'is_featured' => 'boolean', 'is_published' => 'boolean'];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    /** Gallery items in order: [{media: Media, caption: array}] — missing media are skipped. */
    public function galleryItems(): Collection
    {
        $rows = collect($this->gallery ?? [])->filter(fn ($r) => ! empty($r['image']));
        $media = Media::query()->whereIn('id', $rows->pluck('image'))->get()->keyBy('id');

        return $rows->map(fn ($r) => ['media' => $media[$r['image']] ?? null, 'caption' => $r['caption'] ?? null])
            ->filter(fn ($r) => $r['media'])->values();
    }

    /** Client name, shown only when the client approved being named. */
    public function publicClientName(?string $locale = null): ?string
    {
        return $this->client_approved ? (t($this->client_name, $locale) ?: null) : null;
    }

    public function url(?string $locale = null): string
    {
        return lroute('engagements.show', ['engagement' => $this->slug], $locale);
    }
}
