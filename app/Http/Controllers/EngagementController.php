<?php

namespace App\Http\Controllers;

use App\Models\Engagement;
use App\Models\Page;
use App\Support\Schema;
use App\Support\Seo;

class EngagementController extends Controller
{
    public function index()
    {
        $page = Page::query()->where('key', 'engagements')->where('is_published', true)->first();
        $engagements = Engagement::query()->where('is_published', true)->with('image')
            ->orderByDesc('is_featured')->orderBy('sort')->orderByDesc('event_date')->get();

        $title = $page ? t($page->title) : __('site.engagements');
        $seo = $page ? Seo::forModel($page, $title, t($page->intro), fn ($l) => lroute('engagements.index', [], $l))
            : Seo::make($title)->withAlternates(fn ($l) => lroute('engagements.index', [], $l));
        $seo->crumbs([[__('site.home'), lroute('home')], [$title, lroute('engagements.index')]]);
        $seo->addSchema(Schema::breadcrumbs($seo->breadcrumbs));

        return view('engagements.index', compact('page', 'engagements', 'seo', 'title'));
    }

    public function show(Engagement $engagement)
    {
        abort_unless($engagement->is_published, 404);
        $engagement->load('image');
        $gallery = $engagement->galleryItems();
        $seo = Seo::forModel($engagement, t($engagement->title), t($engagement->summary), fn ($l) => $engagement->url($l));
        $seo->crumbs([
            [__('site.home'), lroute('home')],
            [__('site.engagements'), lroute('engagements.index')],
            [t($engagement->title), $engagement->url()],
        ]);
        $seo->ogImage ??= ($engagement->image ?? $gallery->first()['media'] ?? null)?->url(1200);
        $seo->addSchema(Schema::engagement($engagement, $gallery))->addSchema(Schema::breadcrumbs($seo->breadcrumbs));

        $others = Engagement::query()->where('is_published', true)->whereKeyNot($engagement->id)->with('image')
            ->orderBy('sort')->orderByDesc('event_date')->limit(3)->get();

        return view('engagements.show', compact('engagement', 'gallery', 'seo', 'others'));
    }
}
