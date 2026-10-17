<?php

namespace App\Support;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Registers uploaded images in the media library and generates responsive
 * WebP (and AVIF where the server's GD supports it) variants using plain GD,
 * which is available on standard shared hosting.
 */
class MediaProcessor
{
    public const WIDTHS = [480, 960, 1600];

    public const MAX_SOURCE = 2400;

    public static function register(string $path, ?string $originalName = null, array $attributes = [], string $disk = 'media'): Media
    {
        $media = new Media(['disk' => $disk, 'path' => $path, 'original_name' => $originalName] + $attributes);
        static::process($media);
        $media->save();

        return $media;
    }

    /** (Re)builds metadata and variants for the media item's current file. */
    public static function process(Media $media): Media
    {
        $storage = Storage::disk($media->disk);
        $absolute = $storage->path($media->path);
        $media->size = @filesize($absolute) ?: 0;
        $media->mime = @mime_content_type($absolute) ?: null;
        $media->title ??= Str::headline(pathinfo($media->original_name ?: $media->path, PATHINFO_FILENAME));

        foreach ($media->variants ?? [] as $set) {
            $storage->delete(array_values($set));
        }
        $media->variants = null;

        if (! str_starts_with((string) $media->mime, 'image/') || $media->mime === 'image/svg+xml' || ! function_exists('imagecreatefromstring')) {
            return $media;
        }

        $raw = @file_get_contents($absolute);
        $image = $raw !== false ? @imagecreatefromstring($raw) : false;
        if (! $image) {
            return $media;
        }
        $image = static::orient($image, $absolute, $media->mime);
        $w = imagesx($image);
        $h = imagesy($image);

        // Keep very large originals reasonable for the web.
        if ($w > self::MAX_SOURCE && in_array($media->mime, ['image/jpeg', 'image/png', 'image/webp'], true)) {
            $scaled = imagescale($image, self::MAX_SOURCE, (int) round($h * self::MAX_SOURCE / $w), IMG_BICUBIC);
            if ($scaled) {
                static::write($scaled, $absolute, $media->mime);
                imagedestroy($image);
                $image = $scaled;
                $w = imagesx($image);
                $h = imagesy($image);
                $media->size = @filesize($absolute) ?: $media->size;
            }
        }
        $media->width = $w;
        $media->height = $h;

        $variants = [];
        $dir = pathinfo($media->path, PATHINFO_DIRNAME);
        $base = pathinfo($media->path, PATHINFO_FILENAME);
        $formats = ['webp' => 'imagewebp'];
        if (function_exists('imageavif') && (gd_info()['AVIF Support'] ?? false)) {
            $formats['avif'] = 'imageavif';
        }
        foreach (array_unique(array_merge(array_filter(self::WIDTHS, fn ($t) => $t < $w), [$w])) as $target) {
            $resized = $target === $w ? $image : imagescale($image, $target, (int) round($h * $target / $w), IMG_BICUBIC);
            if (! $resized) {
                continue;
            }
            imagepalettetotruecolor($resized);
            imagealphablending($resized, true);
            imagesavealpha($resized, true);
            foreach ($formats as $ext => $fn) {
                $rel = ($dir === '.' ? '' : $dir.'/').$base.'-'.$target.'.'.$ext;
                $ok = $ext === 'avif' ? @$fn($resized, $storage->path($rel), 55, 6) : @$fn($resized, $storage->path($rel), 80);
                if ($ok) {
                    $variants[$ext][$target] = $rel;
                }
            }
            if ($resized !== $image) {
                imagedestroy($resized);
            }
        }
        imagedestroy($image);
        $media->variants = $variants ?: null;

        return $media;
    }

    protected static function orient(\GdImage $image, string $path, string $mime): \GdImage
    {
        if ($mime !== 'image/jpeg' || ! function_exists('exif_read_data')) {
            return $image;
        }
        $exif = @exif_read_data($path);
        $angle = match ((int) ($exif['Orientation'] ?? 1)) { 3 => 180, 6 => -90, 8 => 90, default => 0 };
        if ($angle !== 0 && ($rotated = imagerotate($image, $angle, 0))) {
            imagedestroy($image);
            static::write($rotated, $path, $mime);

            return $rotated;
        }

        return $image;
    }

    protected static function write(\GdImage $image, string $path, string $mime): void
    {
        match ($mime) {
            'image/png' => imagepng($image, $path, 7),
            'image/webp' => imagewebp($image, $path, 85),
            default => imagejpeg($image, $path, 85),
        };
    }
}
