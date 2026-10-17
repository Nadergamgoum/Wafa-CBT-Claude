{{-- Engagement card. Params: engagement --}}
@php $e = $engagement; $cover = $e->image ?? $e->galleryItems()->first()['media'] ?? null; @endphp
<article class="card eng-card">
    <div class="card__media">@include('components.media', ['media' => $cover, 'fallback' => art('training'), 'alt' => '', 'sizes' => '(min-width:1100px) 380px, (min-width:700px) 46vw, 90vw', 'widths' => 960])</div>
    <div class="card__body">
        <p class="card__meta">
            <span class="pill">{{ __('site.engagements') }}</span>
            @if ($e->event_date)<span>{{ $e->event_date->translatedFormat('j F Y') }}</span>@endif
        </p>
        <h3 class="card__title"><a href="{{ $e->url() }}">{{ t($e->title) }}</a></h3>
        @if ($s = t($e->summary))<p>{{ \Illuminate\Support\Str::limit($s, 170) }}</p>@endif
        <span class="link-arrow card__foot">{{ __('site.view_engagement') }} {!! icon('arrow-right', 'icon flip-rtl') !!}</span>
    </div>
</article>
