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

        // Official WAFA logo files ship with the site and are used until a replacement is uploaded.
        return $m?->url() ?? asset($light ? 'images/brand/wafa-logo-reversed.png' : 'images/brand/wafa-logo.png');
    }

    public static function faviconUrl(int $size = 32): string
    {
        return static::media('favicon')?->url() ?? asset('images/brand/favicon-'.(in_array($size, [32, 180, 192, 512], true) ? $size : 32).'.png');
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

        // Optional typography switch: headings in the sans-serif family instead of the editorial serif.
        if (setting('brand.heading_font') === 'sans') {
            $out[] = '--font-display:var(--font-sans)';
        }

        return $out ? ':root{'.implode(';', $out).'}' : '';
    }
}
