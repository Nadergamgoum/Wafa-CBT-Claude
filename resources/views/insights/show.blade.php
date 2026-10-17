@extends('layouts.site')

@section('content')
@php
    [$body, $toc] = \App\Support\Html::withToc(\App\Support\Html::clean(t($post->body)));
@endphp
<article class="article">
    <header class="article__head">
        <div class="container--narrow">
            @include('partials.crumbs', ['crumbs' => $seo->breadcrumbs])
            <p class="card__meta">
                @if ($post->category)<a class="pill" href="{{ $post->category->url() }}">{{ t($post->category->name) }}</a>@endif
                <span>{{ $post->published_at?->translatedFormat('j F Y') }}</span>
                <span>{{ __('site.min_read', ['n' => $post->readingMinutes()]) }}</span>
            </p>
            <h1 class="h1">{{ t($post->title) }}</h1>
            @if ($ex = t($post->excerpt))<p class="lead">{{ $ex }}</p>@endif
            <p class="article__by">{!! icon('user-round') !!} {{ __('site.by') }} <strong>{{ $post->authorLabel() }}</strong>
                @if ($post->updated_at && $post->published_at && $post->updated_at->gt($post->published_at->copy()->addDay())) · {{ __('site.updated') }} {{ $post->updated_at->translatedFormat('j F Y') }}@endif</p>
        </div>
        <div class="container article__cover">
            <div class="frame frame--16x9">@include('components.media', ['media' => $post->image, 'fallback' => art('insight-'.(($post->id % 3) + 1)), 'eager' => true, 'sizes' => '(min-width:1280px) 1200px, 100vw'])</div>
        </div>
    </header>
    <div class="container article__grid">
        @if (count($toc) > 2)
            <aside class="article__toc">
                <details open>
                    <summary>{{ __('site.in_this_article') }}</summary>
                    <ol>@foreach ($toc as $item)<li><a href="#{{ $item['id'] }}">{{ $item['text'] }}</a></li>@endforeach</ol>
                </details>
            </aside>
        @endif
        <div class="prose article__body">{!! $body !!}</div>
    </div>
    @if ($tags = $post->tagList())
        <div class="container--narrow article__tags"><ul>@foreach ($tags as $tg)<li class="pill pill--neutral">{{ $tg }}</li>@endforeach</ul></div>
    @endif
    <div class="container--narrow">
        <div class="article__cta">
            <div><h2 class="h3">{{ __('site.article_cta_title') }}</h2><p class="muted">{{ __('site.article_cta_text') }}</p></div>
            <a class="btn" href="{{ lroute('contact') }}#contact-form" data-event="consultation_click">{{ __('site.talk_to_experts') }}</a>
        </div>
    </div>
</article>
@if ($related->isNotEmpty())
<section class="section bg-mist">
    <div class="container">
        <div class="shead"><h2 class="h2">{{ __('site.related_articles') }}</h2></div>
        <div class="rail rail--grid" data-rail style="--cols: 3">
            <ul class="rail__track" data-rail-track tabindex="0" aria-label="{{ __('site.related_articles') }}">
                @foreach ($related as $r)
                    <li><article class="card post-card">
                        <div class="card__media">@include('components.media', ['media' => $r->image, 'fallback' => art('insight-'.(($r->id % 3) + 1)), 'alt' => '', 'sizes' => '(min-width:1024px) 30vw, 80vw'])</div>
                        <div class="card__body"><p class="card__meta">@if($r->category)<span>{{ t($r->category->name) }}</span>@endif<span>{{ __('site.min_read', ['n' => $r->readingMinutes()]) }}</span></p><h3 class="card__title"><a href="{{ $r->url() }}">{{ t($r->title) }}</a></h3></div>
                    </article></li>
                @endforeach
            </ul>
            @include('partials.rail-controls')
        </div>
    </div>
</section>
@endif
@endsection
