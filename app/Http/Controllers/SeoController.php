<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\TrainingProgram;
use App\Support\Locales;
use Illuminate\Support\Facades\Cache;

class SeoController extends Controller
{
    public function sitemap()
    {
        $xml = Cache::remember('sitemap.'.\App\Support\Content::version(), now()->addHours(6), function () {
            $entries = [];
            $add = function (callable $urlFor, $updated = null, ?array $seo = null, string $freq = 'monthly', string $priority = '0.6') use (&$entries) {
                if ($seo && array_key_exists('index', $seo) && ! $seo['index']) {
                    return;
                }
                $entries[] = ['urls' => collect(Locales::SUPPORTED)->mapWithKeys(fn ($l) => [$l => $urlFor($l)])->all(),
                    'updated' => $updated, 'freq' => $freq, 'priority' => $priority];
            };

            foreach (Page::query()->where('is_published', true)->get() as $page) {
                $add(fn ($l) => $page->url($l), $page->updated_at, $page->seo, $page->key === 'home' ? 'weekly' : 'monthly', $page->key === 'home' ? '1.0' : '0.6');
            }
            foreach (ServiceCategory::query()->where('is_published', true)->get() as $cat) {
                $add(fn ($l) => $cat->url($l), $cat->updated_at, $cat->seo, 'monthly', '0.8');
            }
            foreach (Service::query()->where('is_published', true)->with('category')->get() as $s) {
                if (! $s->category?->is_published) {
                    continue;
                }
                $add(fn ($l) => $s->url($l), $s->updated_at, $s->seo, 'monthly', $s->family === 'medical' ? '0.95' : '0.85');
            }
            foreach (TrainingProgram::query()->where('is_published', true)->get() as $p) {
                $add(fn ($l) => $p->url($l), $p->updated_at, $p->seo, 'weekly', '0.6');
            }
            foreach (Post::query()->live()->get() as $p) {
                $add(fn ($l) => $p->url($l), $p->updated_at, $p->seo, 'monthly', '0.6');
            }
            foreach (PostCategory::query()->whereHas('posts', fn ($q) => $q->live())->get() as $c) {
                $add(fn ($l) => $c->url($l), $c->updated_at, null, 'weekly', '0.4');
            }

            return view('seo.sitemap', ['entries' => $entries])->render();
        });

        return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    public function robots()
    {
        $allow = (bool) setting('seo.allow_indexing', true) && ! config('app.force_noindex');
        $lines = ['User-agent: *'];
        if ($allow) {
            $lines[] = 'Disallow: /admin';
            $lines[] = 'Disallow: /livewire';
            $lines[] = 'Disallow: /install';
            $lines[] = 'Disallow: /*?*format=';
            $lines[] = 'Disallow: /*?*category=';
        } else {
            $lines[] = 'Disallow: /';
        }
        if ($extra = trim((string) setting('seo.robots_extra'))) {
            $lines[] = '';
            $lines[] = $extra;
        }
        $lines[] = '';
        $lines[] = 'Sitemap: '.route('sitemap');

        return response(implode("\n", $lines)."\n", 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    }
}
