<?php

namespace App\Models\Concerns;

trait HasSeo
{
    public function seoValue(string $key, ?string $locale = null): mixed
    {
        $seo = $this->seo ?? [];
        $value = $seo[$key] ?? null;

        return is_array($value) && array_key_exists('en', $value) ? t($value, $locale) : $value;
    }
}
