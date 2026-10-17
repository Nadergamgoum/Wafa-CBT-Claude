<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\PostCategory;
use App\Support\Schema;
use App\Support\Seo;

class InsightController extends Controller
{
    public function index()
    {
        return $this->listing(null);
    }

    public function category(PostCategory $category)
    {
        return $this->listing($category);
    }

    protected function listing(?PostCategory $category)
    {
        $page = Page::query()->where('key', 'insights')->first();
        $posts = Post::query()->live()->with(['category', 'image', 'author'])
            ->when($category, fn ($q) => $q->where('post_category_id', $category->id))
            ->orderByDesc('is_featured')->orderByDesc('published_at')->paginate(9);
        $categories = PostCategory::query()->whereHas('posts', fn ($q) => $q->live())->orderBy('sort')->get();

        $title = $page ? t($page->title) : __('site.insights');
        if ($category) {
            $seo = Seo::make(t($category->name).' — '.$title)->withAlternates(fn ($l) => $category->url($l));
        } else {
            $seo = $page ? Seo::forModel($page, $title, t($page->intro), fn ($l) => lroute('insights.index', [], $l))
                : Seo::make($title)->withAlternates(fn ($l) => lroute('insights.index', [], $l));
        }
        if ($posts->currentPage() > 1) {
            $seo->canonical = $posts->url($posts->currentPage());
        }
        $crumbs = [[__('site.home'), lroute('home')], [$title, lroute('insights.index')]];
        if ($category) {
            $crumbs[] = [t($category->name), $category->url()];
        }
        $seo->crumbs($crumbs)->addSchema(Schema::breadcrumbs($crumbs));

        return view('insights.index', compact('page', 'posts', 'categories', 'category', 'seo'));
    }

    public function show(Post $post)
    {
        abort_unless($post->is_published && $post->published_at && $post->published_at->lte(now()), 404);
        $post->load(['category', 'image', 'author']);
        $seo = Seo::forModel($post, t($post->title), t($post->excerpt), fn ($l) => $post->url($l));
        $seo->ogType = 'article';
        if ($post->image) {
            $seo->ogImage ??= $post->image->url(1200);
        }
        $crumbs = [[__('site.home'), lroute('home')], [__('site.insights'), lroute('insights.index')]];
        if ($post->category) {
            $crumbs[] = [t($post->category->name), $post->category->url()];
        }
        $crumbs[] = [t($post->title), $post->url()];
        $seo->crumbs($crumbs)->addSchema(Schema::article($post))->addSchema(Schema::breadcrumbs($crumbs));

        $related = Post::query()->live()->whereKeyNot($post->id)->with(['category', 'image'])
            ->when($post->post_category_id, fn ($q) => $q->orderByRaw('post_category_id = ? desc', [$post->post_category_id]))
            ->orderByDesc('published_at')->limit(3)->get();

        return view('insights.show', compact('post', 'seo', 'related'));
    }
}
