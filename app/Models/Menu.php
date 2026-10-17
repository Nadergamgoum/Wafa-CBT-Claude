<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Menu extends Model
{
    public const LOCATIONS = ['header' => 'Header navigation', 'footer_company' => 'Footer — Company', 'footer_legal' => 'Footer — Legal'];

    protected $fillable = ['location', 'name', 'items'];

    protected $casts = ['items' => 'array'];

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('wafa.menus'));
        static::deleted(fn () => Cache::forget('wafa.menus'));
    }

    public static function items(string $location): array
    {
        $all = Cache::rememberForever('wafa.menus', fn () => static::query()->pluck('items', 'location')->all());
        $items = $all[$location] ?? [];

        return is_array($items) ? $items : (json_decode((string) $items, true) ?: []);
    }
}
