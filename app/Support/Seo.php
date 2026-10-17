<?php

namespace App\Support;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;

/**
 * Per-request SEO state rendered by partials/seo.blade.php.
 */
class Seo
{
    public string $title = '';

    public string $description = '';

    public ?string $canonical = null;

    /** @var array<string,string> locale => url */
    public array $alternates = [];

    public bool $index = true;

    public bool $follow = true;

    public ?string $ogTitle = null;

    public ?string $ogDescription = null;

    public ?string $ogImage = null;

    public string $ogType = 'website';

    public string $twitterCard = 'summary_large_image';

    public array $schema = [];

    public array $breadcrumbs = [];

    public static function make(string $title, ?string $description = null): self
    {
        $seo = new self;
        $seo->title = $title;
        $seo->description = (string) $description;

        return $seo;
    }

    /**
     * Builds SEO from a model's `seo` JSON with sensible fallbacks.
     *
     * @param  callable(string $locale): string  $urlFor
     */
    public static function forModel(Model $model, string $fallbackTitle, ?string $fallbackDescription, callable $urlFor, bool $publishedInBothLocales = true): self
    {
        $data = $model->seo ?? [];
        $locale = app()->getLocale();
        $seo = self::make(t($data['title'] ?? null) ?: $fallbackTitle, t($data['description'] ?? null) ?: $fallbackDescription);
        $seo->ogTitle = t($data['og_title'] ?? null) ?: null;
        $seo->ogDescription = t($data['og_description'] ?? null) ?: null;
        if (! empty($data['og_image_id']) && ($m = Media::find($data['og_image_id']))) {
            $seo->ogImage = $m->url(1200);
        }
        $seo->index = (bool) ($data['index'] ?? true);
        $seo->follow = (bool) ($data['follow'] ?? true);
        $seo->twitterCard = $data['twitter_card'] ?? 'summary_large_image';
        foreach (Locales::SUPPORTED as $l) {
            $seo->alternates[$l] = $urlFor($l);
        }
        $custom = t($data['canonical'] ?? null, $locale);
        $seo->canonical = $custom && preg_match('#^https?://#', $custom) ? $custom : $seo->alternates[$locale];

        return $seo;
    }

    public function withAlternates(callable $urlFor): self
    {
        foreach (Locales::SUPPORTED as $l) {
            $this->alternates[$l] = $urlFor($l);
        }
        $this->canonical ??= $this->alternates[app()->getLocale()];

        return $this;
    }

    public function crumbs(array $crumbs): self
    {
        $this->breadcrumbs = $crumbs;

        return $this;
    }

    public function addSchema(array $node): self
    {
        $this->schema[] = $node;

        return $this;
    }

    public function fullTitle(): string
    {
        $site = t(setting('general.site_name')) ?: 'WAFA';
        $pattern = t(setting('seo.title_pattern')) ?: '%title% | %site%';
        if ($this->title === '' || $this->title === $site) {
            return $site;
        }
        if (mb_stripos($this->title, $site) !== false) {
            return $this->title;
        }

        return str_replace(['%title%', '%site%'], [$this->title, $site], $pattern);
    }

    public function robots(): string
    {
        $global = (bool) setting('seo.allow_indexing', true) && ! config('app.force_noindex');
        $index = $this->index && $global;

        return ($index ? 'index' : 'noindex').','.($this->follow ? 'follow' : 'nofollow').($index ? ',max-image-preview:large' : '');
    }
}
