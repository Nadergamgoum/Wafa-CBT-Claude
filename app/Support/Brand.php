<?php

namespace App\Support;

use App\Models\Media;

class Brand
{
    protected static array $cache = [];

    public static function media(string $key): ?Media
    {
        if (! array_key_exists($key, static::$cache)) {
            $id = setting('brand.'.$key);
            static::$cache[$key] = $id ? Media::find($id) : null;
        }

        return static::$cache[$key];
    }

    public static function logoUrl(bool $light = false): ?string
    {
        $m = $light ? (static::media('logo_light') ?? static::media('logo')) : static::media('logo');

        return $m?->url();
    }

    /** CSS custom properties for colours configured in the CMS (validated hex only). */
    public static function cssVariables(): string
    {
        $map = ['primary' => '--brand-primary', 'secondary' => '--brand-secondary', 'accent' => '--brand-accent'];
        $out = [];
        foreach ($map as $key => $var) {
            $value = (string) setting('brand.color_'.$key);
            if (preg_match('/^#[0-9a-fA-F]{6}$/', $value)) {
                $out[] = $var.':'.$value;
            }
        }

        return $out ? ':root{'.implode(';', $out).'}' : '';
    }
}
