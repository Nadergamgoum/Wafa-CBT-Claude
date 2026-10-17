<?php

namespace App\Support;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;

/**
 * Factual SEO checks (no invented scores): missing titles/descriptions, length
 * guidance, missing H1, missing image alt text, noindex, canonical and slug quality.
 */
class SeoAudit
{
    /** @return array<int, array{level:string, message:string}> */
    public static function check(Model $model, string $h1Attribute = 'title', array $imageAttributes = []): array
    {
        $issues = [];
        $seo = $model->seo ?? [];
        foreach (['en' => 'English', 'ar' => 'Arabic'] as $l => $name) {
            $h1 = trim(str_replace('*', '', (string) (($model->{$h1Attribute} ?? [])[$l] ?? '')));
            if ($h1 === '') {
                $issues[] = ['level' => 'danger', 'message' => "Missing {$name} page title (H1)."];
            }
            $title = trim((string) ($seo['title'][$l] ?? ''));
            if ($title === '') {
                $issues[] = ['level' => 'warning', 'message' => "No {$name} SEO title — the page title will be used."];
            } elseif (mb_strlen($title) > 65) {
                $issues[] = ['level' => 'warning', 'message' => "{$name} SEO title is ".mb_strlen($title).' characters; search engines usually show about 60.'];
            }
            $desc = trim((string) ($seo['description'][$l] ?? ''));
            if ($desc === '') {
                $issues[] = ['level' => 'warning', 'message' => "Missing {$name} meta description."];
            } elseif (mb_strlen($desc) < 70 || mb_strlen($desc) > 170) {
                $issues[] = ['level' => 'info', 'message' => "{$name} meta description is ".mb_strlen($desc).' characters; 120–160 is a good range.'];
            }
            $canonical = trim((string) ($seo['canonical'][$l] ?? ''));
            if ($canonical !== '' && ! preg_match('#^https://#', $canonical)) {
                $issues[] = ['level' => 'warning', 'message' => "{$name} canonical URL should be a full https:// address (leave empty to use the page URL)."];
            }
        }
        if (array_key_exists('index', $seo) && ! $seo['index']) {
            $issues[] = ['level' => 'danger', 'message' => 'This page is set to noindex and will not appear in search results.'];
        }
        if (isset($model->slug)) {
            $slug = (string) $model->slug;
            if (! preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $slug)) {
                $issues[] = ['level' => 'warning', 'message' => 'Slug should use lowercase letters, numbers and single dashes.'];
            } elseif (strlen($slug) > 70 || substr_count($slug, '-') > 7) {
                $issues[] = ['level' => 'info', 'message' => 'Slug is long; shorter URLs are easier to read and share.'];
            }
        }
        foreach ($imageAttributes as $attr) {
            if ($id = $model->{$attr} ?? null) {
                $m = Media::find($id);
                if ($m && (trim((string) ($m->alt['en'] ?? '')) === '' || trim((string) ($m->alt['ar'] ?? '')) === '')) {
                    $issues[] = ['level' => 'warning', 'message' => 'An image on this page ("'.$m->label().'") is missing English or Arabic alt text.'];
                }
            }
        }

        return $issues;
    }
}
