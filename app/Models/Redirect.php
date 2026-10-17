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

    public static function normalize(string $path): string
    {
        $path = parse_url(trim($path), PHP_URL_PATH) ?: '/';
        $path = '/'.trim(rawurldecode($path), '/');

        return mb_strtolower($path);
    }

    /** @return array<string, array{0:string,1:int,2:int}> */
    public static function map(): array
    {
        return Cache::rememberForever('wafa.redirects', fn () => static::query()->where('is_active', true)->get()
            ->mapWithKeys(fn ($r) => [$r->from_path => [$r->to_url, $r->status_code, $r->id]])->all());
    }
}
