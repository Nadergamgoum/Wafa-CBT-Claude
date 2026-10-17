{{-- Standard inner-page hero. Params: title, intro, crumbs, image (?Media), art, eyebrow, tone --}}
@php $tone = $tone ?? 'ivory'; @endphp
<section class="phero phero--{{ $tone }} {{ $tone === 'dark' ? 'on-dark' : '' }}">
    <div class="container phero__grid {{ ! empty($art) || ! empty($image) ? 'has-media' : '' }}">
        <div class="phero__copy">
            @include('partials.crumbs', ['crumbs' => $crumbs ?? [], 'light' => $tone === 'dark'])
            @if (! empty($eyebrow))<p class="eyebrow {{ $tone === 'dark' ? 'eyebrow--light' : '' }}">{{ $eyebrow }}</p>@endif
            <h1 class="h1">{!! rich_title($title) !!}</h1>
            @if (! empty($intro))<p class="lead">{{ $intro }}</p>@endif
            {!! $actions ?? '' !!}
        </div>
        @if (! empty($art) || ! empty($image))
            <div class="phero__media frame">@include('components.media', ['media' => $image ?? null, 'fallback' => ! empty($art) ? art($art) : null, 'eager' => true, 'sizes' => '(min-width:1024px) 40vw, 100vw'])</div>
        @endif
    </div>
</section>
