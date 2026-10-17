@extends('layouts.site')

@section('content')
@php
    $e = $engagement;
    $highlights = lines($e->highlights);
    $cover = $e->image ?? $gallery->first()['media'] ?? null;
    $client = $e->publicClientName();
    $ctaLabel = t($e->cta_label) ?: __('site.talk_to_experts');
    $ctaLink = link_url($e->cta_link ?: '/contact#contact-form');
@endphp
<div data-accent="teal">
<section class="phero phero--ivory eng-hero">
    <div class="container phero__grid has-media">
        <div class="phero__copy">
            @include('partials.crumbs', ['crumbs' => $seo->breadcrumbs])
            <p class="eyebrow">{{ __('site.engagements') }}</p>
            <h1 class="h1">{{ t($e->title) }}</h1>
            @if ($s = t($e->summary))<p class="lead">{{ $s }}</p>@endif
            @if ($client || $e->event_date)
                <dl class="eng-facts">
                    @if ($client)<div><dt>{{ __('site.client') }}</dt><dd>{{ $client }}</dd></div>@endif
                    @if ($e->event_date)<div><dt>{{ __('site.date') }}</dt><dd>{{ $e->event_date->translatedFormat('j F Y') }}</dd></div>@endif
                </dl>
            @endif
            <div class="btn-row">
                <a class="btn" href="{{ $ctaLink }}" data-event="consultation_click">{{ $ctaLabel }} {!! icon('arrow-right', 'icon flip-rtl') !!}</a>
                @if ($gallery->isNotEmpty())<a class="btn btn--ghost" href="#gallery">{!! icon('images') !!} {{ __('site.gallery') }}</a>@endif
            </div>
        </div>
        <div class="phero__media frame">@include('components.media', ['media' => $cover, 'fallback' => art('training'), 'eager' => true, 'sizes' => '(min-width:1024px) 40vw, 100vw'])</div>
    </div>
</section>

@if (t($e->body) || $highlights)
<section class="section eng">
    <div class="container eng__grid">
        @if ($body = t($e->body))<div class="prose eng__body">{!! \App\Support\Html::clean($body) !!}</div>@endif
        @if ($highlights)
            <aside class="eng__aside">
                <h2 class="h4">{{ __('site.highlights') }}</h2>
                <ul class="checks">@foreach ($highlights as $h)<li>{{ $h }}</li>@endforeach</ul>
            </aside>
        @endif
    </div>
</section>
@endif

@if ($gallery->isNotEmpty())
<section class="section bg-mist" id="gallery" aria-labelledby="gallery-title">
    <div class="container">
        <div class="shead"><h2 class="h2" id="gallery-title">{{ __('site.gallery') }}</h2></div>
        @include('partials.gallery', ['items' => $gallery, 'gid' => 'eng-'.$e->id])
    </div>
</section>
@endif

@include('blocks.cta_band', ['b' => [
    'layout' => 'dark',
    'title' => ['en' => $ctaLabel, 'ar' => $ctaLabel],
    'lead' => ['en' => __('site.engagement_cta_text', [], 'en'), 'ar' => __('site.engagement_cta_text', [], 'ar')],
    'cta_label' => ['en' => __('site.talk_to_experts', [], 'en'), 'ar' => __('site.talk_to_experts', [], 'ar')],
    'cta_link' => $e->cta_link ?: '/contact#contact-form',
], 'bid' => 'eng-cta', 'ctx' => null])

@if ($others->isNotEmpty())
<section class="section bg-ivory">
    <div class="container">
        <div class="shead"><h2 class="h2">{{ __('site.more_engagements') }}</h2></div>
        <ul class="progidx__grid">@foreach ($others as $o)<li>@include('engagements.card', ['engagement' => $o])</li>@endforeach</ul>
    </div>
</section>
@endif
</div>
@endsection
