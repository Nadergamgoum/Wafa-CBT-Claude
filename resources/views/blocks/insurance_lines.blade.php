@php
    use App\Support\Content;
    $services = Content::servicesByIds($b['services'] ?? []);
    if ($services->isEmpty()) {
        $services = (Content::category('insurance')?->publishedServices ?? collect())->where('family', '!=', 'medical')->values();
    }
    $bg = $b['background'] ?? 'white';
@endphp
@if ($services->isNotEmpty())
<section class="section lines {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'split'])
        <div class="rail rail--grid" data-rail style="--cols: {{ min(3, $services->count()) }}; --rail-item: min(80%, 320px)">
            <ul class="rail__track" data-rail-track tabindex="0" aria-label="{{ plain_title(t($b['title'] ?? null)) }}">
                @foreach ($services as $s)
                    <li class="card line-card" data-accent="{{ $s->accent }}">
                        <div class="card__media">@include('components.media', ['media' => $s->cardImage, 'fallback' => $s->artUrl('card'), 'alt' => '', 'sizes' => '(min-width:1024px) 30vw, 80vw'])</div>
                        <div class="card__body">
                            <span class="line-card__ico icon-tile">{!! icon($s->icon ?: 'shield') !!}</span>
                            <h3 class="card__title"><a href="{{ $s->url() }}">{{ t($s->title) }}</a></h3>
                            <p>{{ t($s->summary) }}</p>
                            <span class="card__foot link-arrow">{{ __('site.learn_more') }} {!! icon('arrow-right', 'icon flip-rtl') !!}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
            @include('partials.rail-controls')
        </div>
        @if (t($b['cta_label'] ?? null))<div class="lines__cta">@include('partials.cta', ['b' => $b])</div>@endif
    </div>
</section>
@endif
