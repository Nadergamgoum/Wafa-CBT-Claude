@php
    $posts = \App\Support\Content::posts(max(2, (int) ($b['limit'] ?? 4) ?: 4));
    $featured = $posts->first();
    $rest = $posts->slice(1);
    $bg = $b['background'] ?? 'white';
@endphp
@if ($featured)
<section class="section ins {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'split'])
        <div class="ins__grid">
            <article class="ins__featured">
                <a class="frame frame--3x2" href="{{ $featured->url() }}" tabindex="-1" aria-hidden="true">
                    @include('components.media', ['media' => $featured->image, 'fallback' => art('insight-'.(($featured->id % 3) + 1)), 'alt' => '', 'sizes' => '(min-width:1024px) 56vw, 100vw'])
                </a>
                <div class="ins__fbody">
                    <p class="card__meta">
                        @if ($featured->category)<span class="pill">{{ t($featured->category->name) }}</span>@endif
                        <span>{{ $featured->published_at?->translatedFormat('j F Y') }}</span>
                        <span>{{ __('site.min_read', ['n' => $featured->readingMinutes()]) }}</span>
                    </p>
                    <h3 class="h3"><a href="{{ $featured->url() }}">{{ t($featured->title) }}</a></h3>
                    <p class="muted">{{ t($featured->excerpt) }}</p>
                    <a class="link-arrow" href="{{ $featured->url() }}" aria-label="{{ __('site.read_article') }}: {{ t($featured->title) }}">{{ __('site.read_article') }} {!! icon('arrow-right', 'icon flip-rtl') !!}</a>
                </div>
            </article>
            @if ($rest->isNotEmpty())
                <div class="rail ins__rail" data-rail style="--rail-item: min(80%, 320px)">
                    <ul class="rail__track ins__list" data-rail-track tabindex="0" aria-label="{{ __('site.more_insights') }}">
                        @foreach ($rest as $p)
                            <li class="ins__item">
                                <a class="ins__thumb frame" href="{{ $p->url() }}" tabindex="-1" aria-hidden="true">@include('components.media', ['media' => $p->image, 'fallback' => art('insight-'.(($p->id % 3) + 1)), 'alt' => '', 'sizes' => '160px', 'widths' => 480])</a>
                                <div>
                                    <p class="card__meta">@if($p->category)<span>{{ t($p->category->name) }}</span>@endif<span>{{ __('site.min_read', ['n' => $p->readingMinutes()]) }}</span></p>
                                    <h3 class="h4"><a href="{{ $p->url() }}">{{ t($p->title) }}</a></h3>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @include('partials.rail-controls')
                </div>
            @endif
        </div>
        <div class="ins__all"><a class="link-arrow" href="{{ lroute('insights.index') }}">{{ t($b['cta_label'] ?? null) ?: __('site.all_insights') }} {!! icon('arrow-right', 'icon flip-rtl') !!}</a></div>
    </div>
</section>
@endif
