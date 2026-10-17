<?php

// Helpers for the bilingual seed content files.

if (! function_exists('tx')) {
    /** Translatable value. */
    function tx(string $en, string $ar): array
    {
        return ['en' => $en, 'ar' => $ar];
    }
}

if (! function_exists('L')) {
    /** Translatable "one item per line" list. */
    function L(array $en, array $ar): array
    {
        return ['en' => implode("\n", $en), 'ar' => implode("\n", $ar)];
    }
}

if (! function_exists('B')) {
    /** Content block. */
    function B(string $type, array $data): array
    {
        return ['type' => $type, 'data' => ['visible' => true] + $data];
    }
}

if (! function_exists('I')) {
    /** Repeater item with icon/title/text. */
    function I(?string $icon, array $title, ?array $text = null, array $extra = []): array
    {
        return array_filter(['icon' => $icon, 'title' => $title, 'text' => $text], fn ($v) => $v !== null) + $extra;
    }
}

if (! function_exists('SEO')) {
    function SEO(array $title, array $description, ?array $focus = null, ?array $keywords = null): array
    {
        return array_filter([
            'title' => $title,
            'description' => $description,
            'focus_keyword' => $focus,
            'keywords' => $keywords,
            'index' => true,
            'follow' => true,
            'twitter_card' => 'summary_large_image',
        ], fn ($v) => $v !== null);
    }
}
