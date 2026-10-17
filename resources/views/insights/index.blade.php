@extends('layouts.site')

@section('content')
@include('partials.page-hero', [
    'title' => $category ? t($category->name) : ($page ? t($page->title) : __('site.insights')),
    'intro' => $category ? null : ($page ? t($page->intro) : null),
    'crumbs' => $seo->breadcrumbs,
    'eyebrow' => __('site.insights'),
    'tone' => 'mist',
])
<section class="section insidx">
    <div class="container">
        @if ($categories->isNotEmpty())
            <nav class="filters__chips insidx__cats" aria-label="{{ __('site.categories') }}">
                <a class="tab" href="{{ lroute('insights.index') }}" aria-selected="{{ $category ? 'false' : 'true' }}" @unless($category) aria-current="page" @endunless>{{ __('programs.all') }}</a>
                @foreach ($categories as $c)
                    <a class="tab" href="{{ $c->url() }}" aria-selected="{{ $category?->id === $c->id ? 'true' : 'false' }}" @if($category?->id === $c->id) aria-current="page" @endif>{{ t($c->name) }}</a>
                @endforeach
            </nav>
        @endif
        @if ($posts->isEmpty())
            <div class="empty">{!! icon('book-open', 'icon icon--lg') !!}<h2 class="h3">{{ __('site.no_insights') }}</h2></div>
        @else
            <ul class="insidx__grid">
                @foreach ($posts as $pi => $post)
                    <li class="{{ $pi === 0 && $posts->currentPage() === 1 ? 'is-lead' : '' }}">
                        <article class="card post-card">
                            <div class="card__media">@include('components.media', ['media' => $post->image, 'fallback' => art('insight-'.(($post->id % 3) + 1)), 'alt' => '', 'sizes' => $pi === 0 ? '(min-width:1024px) 60vw, 100vw' : '(min-width:1024px) 30vw, 100vw', 'eager' => $pi === 0])</div>
                            <div class="card__body">
                                <p class="card__meta">@if($post->category)<span class="pill">{{ t($post->category->name) }}</span>@endif<span>{{ $post->published_at?->translatedFormat('j F Y') }}</span><span>{{ __('site.min_read', ['n' => $post->readingMinutes()]) }}</span></p>
                                <h2 class="card__title"><a href="{{ $post->url() }}">{{ t($post->title) }}</a></h2>
                                <p>{{ t($post->excerpt) }}</p>
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>
            {{ $posts->onEachSide(1)->links('partials.pager') }}
        @endif
    </div>
</section>
@endsection
