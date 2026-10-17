@extends('layouts.site')

@section('content')
@php
    $variant = array_key_exists($service->hero_variant, \App\Models\Service::HERO_VARIANTS) ? $service->hero_variant : 'layered';
    $sections = collect($service->sections ?? [])->filter(fn ($s) => ($s['data']['visible'] ?? true));
@endphp
<div class="svc svc--{{ $service->family }}" data-accent="{{ $service->accent ?: 'teal' }}">
    @include('heroes.'.$variant, ['service' => $service, 'hero' => $service->hero ?? [], 'crumbs' => $seo->breadcrumbs])

    @if ($service->family === 'medical' && $sections->count() > 4)
        @php
            $nav = $sections->map(fn ($s, $i) => ['id' => ($s['data']['anchor'] ?? null) ?: $s['type'].'-'.$i, 'label' => t($s['data']['nav_label'] ?? null) ?: plain_title(t($s['data']['eyebrow'] ?? null))])
                ->filter(fn ($n) => $n['label'] !== '')->take(7);
        @endphp
        <nav class="onpage" aria-label="{{ __('site.on_this_page') }}">
            <div class="container onpage__inner">
                <span class="onpage__label">{{ __('site.on_this_page') }}</span>
                <ul>@foreach ($nav as $n)<li><a href="#{{ $n['id'] }}">{{ $n['label'] }}</a></li>@endforeach</ul>
            </div>
        </nav>
    @endif

    @include('partials.blocks', ['blocks' => $service->sections ?? [], 'ctx' => $service])
</div>
@endsection
