<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Redirect extends Model
{
    protected $fillable = ['from_path', 'to_url', 'status_code', 'is_active', 'hits', 'last_hit_at', 'note'];

    protected $casts = ['is_active' => 'boolean', 'last_hit_at' => 'datetime'];

    protected static function booted(): void
    {
        static::saving(function (Redirect $r) {
            $r->from_path = static::normalize($r->from_path);
        });
        static::saved(fn () => Cache::forget('wafa.redirects'));
        static::deleted(fn () => Cache::forget('wafa.redirects'));
    }

    public const CODES = [301 => '301 — Moved permanently', 302 => '302 — Temporary', 307 => '307 — Temporary (keep method)',
        308 => '308 — Permanent (keep method)', 410 => '410 — Gone (no target)'];

    public static function normalize(string $path): string
    {
        $wildcard = str_ends_with(trim($path), '*');
        $path = parse_url(rtrim(trim($path), '*'), PHP_URL_PATH) ?: '/';
        $path = '/'.trim(rawurldecode($path), '/');
        $path = mb_strtolower($path);

        return $wildcard ? rtrim($path, '/').'*' : $path;
    }

    /** Finds the rule for a normalized path: exact match first, then the most specific wildcard. */
    public static function match(array $map, string $path): ?array
    {
        if (isset($map[$path])) {
            return $map[$path];
        }
        $best = null;
        foreach ($map as $from => $rule) {
            if (str_ends_with($from, '*')) {
                // "/portfolio*" matches /portfolio and everything below it (whole segments only).
                $base = rtrim(substr($from, 0, -1), '/');
                $hit = $path === $base || str_starts_with($path, $base.'/');
                if ($hit && ($best === null || strlen($base) > $best[0])) {
                    $best = [strlen($base), $rule];
                }
            }
        }

        return $best[1] ?? null;
    }

    /** @return array<string, array{0:string,1:int,2:int}> */
    public static function map(): array
    {
        return Cache::rememberForever('wafa.redirects', fn () => static::query()->where('is_active', true)->get()
            ->mapWithKeys(fn ($r) => [$r->from_path => [$r->to_url, $r->status_code, $r->id]])->all());
    }
}
