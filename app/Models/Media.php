<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = ['disk', 'path', 'title', 'original_name', 'mime', 'size', 'width', 'height', 'alt',
        'caption', 'focal_point', 'variants', 'folder', 'uploaded_by'];

    protected $casts = ['alt' => 'array', 'caption' => 'array', 'variants' => 'array'];

    public function url(?int $width = null, string $format = 'webp'): string
    {
        $disk = Storage::disk($this->disk);
        if ($width && ! empty($this->variants[$format])) {
            $candidates = collect($this->variants[$format])->sortKeys();
            $path = $candidates->first(fn ($p, $w) => (int) $w >= $width) ?? $candidates->last();

            return $disk->url($path);
        }

        return $disk->url($this->path);
    }

    /** srcset string for a given format, built from generated variants. */
    public function srcset(string $format = 'webp'): string
    {
        $disk = Storage::disk($this->disk);

        return collect($this->variants[$format] ?? [])
            ->map(fn ($path, $w) => $disk->url($path).' '.$w.'w')
            ->implode(', ');
    }

    public function altText(): string
    {
        return t($this->alt) ?: '';
    }

    public function isImage(): bool
    {
        return str_starts_with((string) $this->mime, 'image/');
    }

    public function label(): string
    {
        return $this->title ?: ($this->original_name ?: basename($this->path));
    }

    protected static function booted(): void
    {
        static::deleting(function (Media $media) {
            $disk = Storage::disk($media->disk);
            $disk->delete($media->path);
            foreach ($media->variants ?? [] as $set) {
                $disk->delete(array_values($set));
            }
        });
    }
}
