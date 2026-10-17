@php
    $layout = $b['layout'] ?? 'image';
    $img = media_find($b['image'] ?? null);
    $channels = collect(\App\Support\Contact::channels())->whereIn('key', ['whatsapp', 'phone', 'email']);
@endphp
<section class="section cta cta--{{ $layout }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        <div class="cta__panel {{ $layout === 'soft' ? '' : 'on-dark' }}">
            @if ($layout === 'image')
                <div class="cta__bg" aria-hidden="true">@include('components.media', ['media' => $img, 'fallback' => art($b['art'] ?? 'cta'), 'alt' => '', 'sizes' => '100vw'])</div>
            @endif
            <div class="cta__deco" aria-hidden="true"></div>
            <div class="cta__content">
                @if ($e = t($b['eyebrow'] ?? null))<p class="eyebrow {{ $layout === 'soft' ? '' : 'eyebrow--light' }}">{{ $e }}</p>@endif
                <h2 class="h1" id="{{ $bid }}-title">{!! rich_title(t($b['title'] ?? null)) !!}</h2>
                @if ($l = t($b['lead'] ?? null))<p class="lead">{{ $l }}</p>@endif
                @include('partials.cta', ['b' => $b, 'light' => $layout !== 'soft'])
                @if ($layout === 'contact' && $channels->isNotEmpty())
                    <ul class="cta__channels">
                        @foreach ($channels as $ch)
                            <li><a href="{{ $ch['href'] }}" data-event="{{ $ch['event'] }}" @if($ch['external']) target="_blank" rel="noopener" @endif>{!! icon($ch['icon']) !!}<span><strong>{{ $ch['label'] }}</strong>@if($ch['detail'])<small @if($ch['key'] !== 'whatsapp') dir="ltr" @endif>{{ $ch['detail'] }}</small>@endif</span></a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</section>
