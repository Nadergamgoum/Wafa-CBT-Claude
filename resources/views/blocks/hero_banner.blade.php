@php
    $layout = $b['layout'] ?? 'split';
    $img = media_find($b['image'] ?? null);
    $fallback = art($b['art'] ?? 'abstract');
    $overlay = $layout === 'overlay';
@endphp
<section class="section hbanner hbanner--{{ $layout }} {{ $overlay ? 'on-dark' : 'bg-'.($b['background'] ?? 'ivory') }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    @if ($overlay)<div class="hbanner__bg" aria-hidden="true">@include('components.media', ['media' => $img, 'fallback' => $fallback, 'alt' => '', 'sizes' => '100vw'])</div>@endif
    <div class="container hbanner__grid">
        <div class="hbanner__copy">
            @if ($e = t($b['eyebrow'] ?? null))<p class="eyebrow">{{ $e }}</p>@endif
            <h2 class="h1" id="{{ $bid }}-title">{!! rich_title(t($b['title'] ?? null)) !!}</h2>
            @if ($l = t($b['lead'] ?? null))<p class="lead">{{ $l }}</p>@endif
            @include('partials.cta', ['b' => $b, 'light' => $overlay])
        </div>
        @if ($layout === 'split')
            <div class="hbanner__media frame frame--4x3">@include('components.media', ['media' => $img, 'fallback' => $fallback, 'sizes' => '(min-width:1024px) 46vw, 100vw'])</div>
        @endif
    </div>
</section>
