@php $img = media_find($b['image'] ?? null); $items = $b['items'] ?? []; @endphp
<section class="section mspot on-dark" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title" data-accent="teal">
    <div class="mspot__glow" aria-hidden="true"></div>
    <div class="container">
        <div class="mspot__head">
            <div>
                @if ($e = t($b['eyebrow'] ?? null))<p class="eyebrow">{{ $e }}</p>@endif
                <h2 class="h1" id="{{ $bid }}-title">{!! rich_title(t($b['title'] ?? null)) !!}</h2>
            </div>
            <div class="mspot__intro">
                @if ($l = t($b['lead'] ?? null))<p class="lead">{{ $l }}</p>@endif
                @if ($body = t($b['body'] ?? null))<p class="muted">{{ $body }}</p>@endif
            </div>
        </div>
        <div class="mspot__grid">
            <figure class="mspot__media">
                <div class="frame frame--4x5 frame--m-16x9">
                    @include('components.media', ['media' => $img, 'fallback' => art($b['art'] ?? 'medical'), 'sizes' => '(min-width: 1024px) 40vw, 100vw'])
                </div>
                @if ($ct = t($b['card_title'] ?? null))
                    <figcaption class="mspot__card">
                        <span class="icon-tile">{!! icon('heart-pulse') !!}</span>
                        <span><strong>{{ $ct }}</strong>@if($cx = t($b['card_text'] ?? null))<span>{{ $cx }}</span>@endif</span>
                    </figcaption>
                @endif
            </figure>
            <div data-more>
                <ul class="mspot__roles">
                    @foreach ($items as $ii => $it)
                        <li @if($ii >= 4) data-more-extra @endif>
                            <span class="icon-tile">{!! icon($it['icon'] ?? 'check') !!}</span>
                            <div>
                                <h3 class="h4">{{ t($it['title'] ?? null) }}</h3>
                                <p>{{ t($it['text'] ?? null) }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @if (count($items) > 4)
                    <button type="button" class="more-btn" data-more-btn data-more="{{ __('site.show_more') }}" data-less="{{ __('site.show_less') }}" hidden><span>{{ __('site.show_more') }}</span>{!! icon('chevron-down') !!}</button>
                @endif
                <div class="mspot__cta">@include('partials.cta', ['b' => $b, 'light' => true])</div>
            </div>
        </div>
    </div>
</section>
