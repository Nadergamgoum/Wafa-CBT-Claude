<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

/**
 * Grouped key/value settings. Each row holds one group (e.g. "contact") as JSON,
 * read with dot notation: setting('contact.email').
 */
class Setting extends Model
{
    public const CACHE_KEY = 'wafa.settings';

    protected $fillable = ['key', 'value'];

    protected $casts = ['value' => 'array'];

    protected static ?array $memo = null;

    protected static function booted(): void
    {
        static::saved(fn () => static::flush());
        static::deleted(fn () => static::flush());
    }

    public static function all_groups(): array
    {
        if (static::$memo !== null) {
            return static::$memo;
        }
        try {
            return static::$memo = Cache::rememberForever(static::CACHE_KEY, function () {
                if (! Schema::hasTable('settings')) {
                    return [];
                }

                return static::query()->pluck('value', 'key')->map(fn ($v) => is_array($v) ? $v : json_decode((string) $v, true))->all();
            });
        } catch (\Throwable) {
            return static::$memo = [];
        }
    }

    public static function read(string $key, mixed $default = null): mixed
    {
        return Arr::get(static::all_groups(), $key, $default);
    }

    public static function group(string $group): array
    {
        return static::all_groups()[$group] ?? [];
    }

    public static function put(string $group, array $value): void
    {
        static::query()->updateOrCreate(['key' => $group], ['value' => $value]);
    }

    public static function flush(): void
    {
        static::$memo = null;
        Cache::forget(static::CACHE_KEY);
    }
}
