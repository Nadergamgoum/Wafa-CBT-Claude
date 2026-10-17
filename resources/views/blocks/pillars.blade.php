@php
    $layout = $b['layout'] ?? 'numbers';
    $items = $b['items'] ?? [];
    $bg = $b['background'] ?? ($layout === 'dark' ? 'dark' : 'white');
@endphp
<section class="section pillars pillars--{{ $layout }} {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => $layout === 'lines' ? 'start' : 'split'])
        <div class="rail pillars__rail" data-rail>
        <ul class="pillars__grid rail__track" data-rail-track tabindex="0" aria-label="{{ plain_title(t($b['title'] ?? null)) }}" style="--cols: {{ in_array(count($items), [5, 6], true) ? 3 : min(4, max(2, count($items))) }}">
            @foreach ($items as $ii => $it)
                <li class="pillar reveal">
                    @if ($layout === 'numbers')
                        <span class="pillar__num" aria-hidden="true">{{ str_pad($ii + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    @else
                        <span class="icon-tile">{!! icon($it['icon'] ?? 'sparkles') !!}</span>
                    @endif
                    <h3 class="h3">{{ t($it['title'] ?? null) }}</h3>
                    <p>{{ t($it['text'] ?? null) }}</p>
                </li>
            @endforeach
        </ul>
        <div class="hide-desktop">@include('partials.rail-controls')</div>
        </div>
    </div>
</section>
