@php $img = media_find($b['image'] ?? null); $chips = $b['chips'] ?? []; @endphp
<section class="hhero" aria-labelledby="{{ $bid }}-title">
    <div class="hhero__bg" aria-hidden="true"></div>
    <div class="container hhero__grid">
        <div class="hhero__copy">
            @if ($e = t($b['eyebrow'] ?? null))<p class="eyebrow">{{ $e }}</p>@endif
            <h1 class="h-hero" id="{{ $bid }}-title">{!! rich_title(t($b['title'] ?? null)) !!}</h1>
            @if ($l = t($b['lead'] ?? null))<p class="lead">{{ $l }}</p>@endif
            @include('partials.cta', ['b' => $b])
            @if ($n = t($b['note'] ?? null))<p class="hhero__note">{!! icon('shield-check') !!}<span>{{ $n }}</span></p>@endif
        </div>
        <div class="hhero__visual">
            <div class="hhero__ring" aria-hidden="true"></div>
            <div class="frame hhero__frame">
                @include('components.media', ['media' => $img, 'fallback' => art($b['art'] ?? 'home-hero'), 'eager' => true, 'sizes' => '(min-width: 1024px) 46vw, 100vw', 'alt' => $img?->altText() ?? ''])
            </div>
            @foreach (array_slice($chips, 0, 3) as $ci => $chip)
                <div class="hhero__chip hhero__chip--{{ $ci + 1 }}">
                    <span class="icon-tile">{!! icon($chip['icon'] ?? 'shield-check') !!}</span>
                    <span><strong>{{ t($chip['label'] ?? null) }}</strong>@if($tx = t($chip['text'] ?? null))<small>{{ $tx }}</small>@endif</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
