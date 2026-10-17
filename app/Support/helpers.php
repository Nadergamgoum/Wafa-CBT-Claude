<?php

use App\Support\Locales;
use App\Models\Setting;

if (! function_exists('t')) {
    /**
     * Resolve a translatable value ({"en": "...", "ar": "..."}) for the current locale,
     * falling back to English when the requested translation is empty.
     */
    function t(mixed $value, ?string $locale = null): string
    {
        if ($value === null) {
            return '';
        }
        if (! is_array($value)) {
            return (string) $value;
        }
        $locale ??= app()->getLocale();
        $text = $value[$locale] ?? null;
        if ($text === null || $text === '' || $text === []) {
            $text = $value[Locales::DEFAULT] ?? '';
        }

        return is_string($text) ? $text : '';
    }
}

if (! function_exists('tl')) {
    /** Translatable list value (array per locale) with English fallback. */
    function tl(mixed $value, ?string $locale = null): array
    {
        if (! is_array($value)) {
            return [];
        }
        $locale ??= app()->getLocale();
        $list = $value[$locale] ?? null;
        if (empty($list)) {
            $list = $value[Locales::DEFAULT] ?? [];
        }

        return is_array($list) ? array_values(array_filter($list, fn ($v) => $v !== null && $v !== '')) : [];
    }
}

if (! function_exists('setting')) {
    function setting(string $key, mixed $default = null): mixed
    {
        return Setting::read($key, $default);
    }
}

if (! function_exists('lroute')) {
    /** Locale-aware route() helper: lroute('services.show', [...]) returns /ar/... in Arabic. */
    function lroute(string $name, mixed $parameters = [], ?string $locale = null, bool $absolute = true): string
    {
        return Locales::route($name, $parameters, $locale, $absolute);
    }
}

if (! function_exists('is_rtl')) {
    function is_rtl(): bool
    {
        return app()->getLocale() === 'ar';
    }
}

if (! function_exists('rich_title')) {
    /** Escapes a heading and turns *phrase* into a highlighted <em> and new lines into <br>. */
    function rich_title(?string $text): string
    {
        $safe = e((string) $text);
        $safe = preg_replace('/\*(.+?)\*/u', '<em class="hl">$1</em>', $safe);

        return nl2br($safe, false);
    }
}

if (! function_exists('plain_title')) {
    function plain_title(?string $text): string
    {
        return trim(preg_replace('/\s+/u', ' ', str_replace('*', '', (string) $text)));
    }
}

if (! function_exists('lines')) {
    /** "One item per line" translatable value → array of trimmed lines. */
    function lines(mixed $value): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\R/u', t($value)) ?: []), fn ($l) => $l !== ''));
    }
}

if (! function_exists('link_url')) {
    /** Resolves a CMS link: site paths get the current locale prefix; external, mailto, tel and anchors pass through. */
    function link_url(?string $link, ?string $locale = null): string
    {
        $link = trim((string) $link);
        if ($link === '') {
            return '#';
        }
        if (str_starts_with($link, '#') || preg_match('#^(https?:|mailto:|tel:)#i', $link)) {
            return $link;
        }
        if ($link === '@whatsapp') {
            return \App\Support\Contact::whatsappUrl() ?? lroute('contact');
        }
        if (! str_starts_with($link, '/')) {
            $link = '/'.$link;
        }
        $locale ??= app()->getLocale();
        if ($locale !== \App\Support\Locales::DEFAULT && ! preg_match('#^/'.$locale.'(/|$)#', $link)) {
            $link = '/'.$locale.($link === '/' ? '' : $link);
        }

        return url($link);
    }
}

if (! function_exists('icon')) {
    function icon(?string $name, string $class = 'icon', ?string $label = null): string
    {
        if (! $name) {
            return '';
        }
        $id = str_starts_with($name, 'b-') ? $name : 'i-'.$name;
        $aria = $label ? 'role="img" aria-label="'.e($label).'"' : 'aria-hidden="true" focusable="false"';

        return '<svg class="'.e($class).'" '.$aria.'><use href="'.asset('images/icons.svg').'#'.e($id).'"></use></svg>';
    }
}

if (! function_exists('media_find')) {
    /** Request-memoised media lookup for block image fields. */
    function media_find(mixed $id): ?\App\Models\Media
    {
        static $memo = [];
        if (is_array($id)) {
            $id = reset($id);
        }
        if (! $id || ! is_numeric($id)) {
            return null;
        }

        return $memo[$id] ??= \App\Models\Media::find((int) $id);
    }
}

if (! function_exists('art')) {
    /** URL of a built-in illustration in public/images/art. */
    function art(?string $name, string $default = 'abstract'): string
    {
        $name = preg_replace('/[^a-z0-9_-]/', '', (string) $name) ?: $default;

        return asset('images/art/'.$name.'.svg');
    }
}
