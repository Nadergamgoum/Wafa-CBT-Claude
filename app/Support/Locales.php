<?php

namespace App\Support;

use Illuminate\Support\Facades\Route;

class Locales
{
    public const DEFAULT = 'en';

    public const SUPPORTED = ['en', 'ar'];

    public static function meta(): array
    {
        return [
            'en' => ['name' => 'English', 'native' => 'English', 'dir' => 'ltr', 'hreflang' => 'en', 'og' => 'en_US'],
            'ar' => ['name' => 'Arabic', 'native' => 'العربية', 'dir' => 'rtl', 'hreflang' => 'ar', 'og' => 'ar_AR'],
        ];
    }

    public static function other(?string $locale = null): string
    {
        return ($locale ?? app()->getLocale()) === 'ar' ? 'en' : 'ar';
    }

    public static function routeName(string $name, string $locale): string
    {
        return $locale === self::DEFAULT ? $name : $locale.'.'.$name;
    }

    public static function route(string $name, mixed $parameters = [], ?string $locale = null, bool $absolute = true): string
    {
        $locale ??= app()->getLocale();

        return route(self::routeName($name, $locale), $parameters, $absolute);
    }

    /**
     * URL of the current page in another locale. Controllers may override the
     * alternates (e.g. when slugs differ) by sharing $alternates with the view.
     */
    public static function switchUrl(string $target): string
    {
        $route = Route::current();
        if (! $route || ! $route->getName()) {
            return $target === self::DEFAULT ? url('/') : url('/'.$target);
        }
        $base = preg_replace('/^(ar)\./', '', $route->getName());

        try {
            return self::route($base, $route->parameters(), $target);
        } catch (\Throwable) {
            return $target === self::DEFAULT ? url('/') : url('/'.$target);
        }
    }
}
