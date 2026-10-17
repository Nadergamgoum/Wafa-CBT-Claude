@extends('layouts.site')

@section('content')
@php
    $hero = $category->hero ?? [];
    $services = $category->publishedServices;
    $flagship = $services->firstWhere('family', 'medical');
    $others = $flagship ? $services->where('id', '!=', $flagship->id) : $services;
@endphp
<div class="catpage catpage--{{ $category->key }}" data-accent="{{ $category->key === 'insurance' ? 'teal' : ($category->key === 'people' ? 'navy' : 'amber') }}">
    @include('partials.page-hero', [
        'title' => t($hero['title'] ?? null) ?: t($category->title),
        'intro' => t($hero['lead'] ?? null) ?: t($category->summary),
        'eyebrow' => t($hero['eyebrow'] ?? null) ?: t($category->title),
        'crumbs' => $seo->breadcrumbs,
        'image' => $category->image,
        'art' => 'cat-'.$category->key,
    ])

    <section class="section catgrid" aria-label="{{ t($category->title) }}">
        <div class="container">
            @if ($flagship)
                <a class="catfeat" href="{{ $flagship->url() }}" data-accent="{{ $flagship->accent }}">
                    <div class="catfeat__media frame">@include('components.media', ['media' => $flagship->cardImage ?? $flagship->heroImage, 'fallback' => $flagship->artUrl('card'), 'sizes' => '(min-width:1024px) 50vw, 100vw'])</div>
                    <div class="catfeat__body">
                        <span class="pill">{{ __('site.flagship_service') }}</span>
                        <h2 class="h2">{{ t($flagship->title) }}</h2>
                        <p class="lead">{{ t($flagship->summary) }}</p>
                        <ul class="checks">
                            @foreach (array_slice($flagship->hero['highlights'] ?? [], 0, 3) as $h)<li>{{ t($h['label'] ?? null) }}</li>@endforeach
                        </ul>
                        <span class="btn">{{ __('site.explore') }} {{ $flagship->navLabel() }} {!! icon('arrow-right', 'icon flip-rtl') !!}</span>
                    </div>
                </a>
            @endif
            <ul class="catlist {{ $others->count() === 2 ? 'catlist--2' : '' }}">
                @foreach ($others as $s)
                    <li class="card catcard" data-accent="{{ $s->accent }}">
                        <div class="card__media">@include('components.media', ['media' => $s->cardImage, 'fallback' => $s->artUrl('card'), 'alt' => '', 'sizes' => '(min-width:1024px) 33vw, 100vw'])</div>
                        <div class="card__body">
                            <span class="icon-tile">{!! icon($s->icon ?: 'sparkles') !!}</span>
                            <h2 class="card__title h3"><a href="{{ $s->url() }}">{{ t($s->title) }}</a></h2>
                            <p>{{ t($s->summary) }}</p>
                            <span class="card__foot link-arrow">{{ __('site.learn_more') }} {!! icon('arrow-right', 'icon flip-rtl') !!}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    @include('partials.blocks', ['blocks' => $category->sections ?? [], 'ctx' => $category, 'faqTopic' => $category->key === 'insurance' ? 'insurance' : $category->key])
</div>
@endsection
