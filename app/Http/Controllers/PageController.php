<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\ServiceCategory;
use App\Support\Content;
use App\Support\Schema;
use App\Support\Seo;

class PageController extends Controller
{
    public function about()
    {
        return $this->render($this->special('about'), 'pages.about');
    }

    public function contact()
    {
        return $this->render($this->special('contact'), 'pages.contact');
    }

    /** Single-segment URLs: service category landing pages first, then CMS pages. */
    public function resolve(string $slug)
    {
        $category = ServiceCategory::query()->where('slug', $slug)->where('is_published', true)->first();
        if ($category) {
            return $this->category($category);
        }

        $page = Page::query()->where('slug', $slug)->where('is_published', true)
            ->whereNotIn('template', ['home', 'about', 'contact', 'insights', 'programs'])->firstOrFail();

        return $this->render($page, $page->template === 'legal' ? 'pages.legal' : 'pages.generic');
    }

    protected function category(ServiceCategory $category)
    {
        $category = Content::categories()->firstWhere('id', $category->id) ?? $category;
        $seo = Seo::forModel($category, t($category->title), t($category->summary), fn ($l) => $category->url($l));
        $seo->crumbs([[__('site.home'), lroute('home')], [t($category->title), $category->url()]]);
        $seo->addSchema(Schema::breadcrumbs($seo->breadcrumbs));

        return view('pages.category', compact('category', 'seo'));
    }

    protected function special(string $key): Page
    {
        return Page::query()->where('key', $key)->where('is_published', true)->firstOrFail();
    }

    protected function render(Page $page, string $view)
    {
        $seo = Seo::forModel($page, t($page->title), t($page->intro), fn ($l) => $page->url($l));
        $seo->crumbs([[__('site.home'), lroute('home')], [t($page->title), $page->url()]]);
        $seo->addSchema(Schema::breadcrumbs($seo->breadcrumbs));
        if ($page->key === 'contact' || $page->key === 'about') {
            $seo->addSchema(Schema::organization());
        }

        return view($view, compact('page', 'seo'));
    }
}
