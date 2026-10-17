@php
    $layout = $b['layout'] ?? 'timeline';
    $items = $b['items'] ?? [];
    $n = count($items);
    $bg = $b['background'] ?? 'ivory';
@endphp
<section class="section proc proc--{{ $layout }} {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => in_array($layout, ['timeline', 'chevrons', 'cycle']) ? 'center' : 'start'])

        @if ($layout === 'cycle')
            <div class="cycle" style="--n: {{ $n }}">
                <div class="cycle__ring" aria-hidden="true">
                    <svg viewBox="0 0 200 200"><circle cx="100" cy="100" r="78" fill="none" stroke="currentColor" stroke-width="1.2" stroke-dasharray="3 5"/><path d="M178 100a78 78 0 0 1-4 25" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" marker-end="url(#cyc-arrow)"/><defs><marker id="cyc-arrow" viewBox="0 0 10 10" refX="5" refY="5" markerWidth="5" markerHeight="5" orient="auto"><path d="M0 0 10 5 0 10z" fill="currentColor"/></marker></defs></svg>
                    <div class="cycle__center"><span>{{ t($b['center_label'] ?? null) }}</span></div>
                </div>
                <ol class="cycle__nodes">
                    @foreach ($items as $ii => $it)
                        <li class="cycle__node" style="--i: {{ $ii }}">
                            <span class="cycle__dot">{!! $it['icon'] ?? null ? icon($it['icon']) : '<b>'.($ii + 1).'</b>' !!}</span>
                            <div><h3 class="h4">{{ t($it['title'] ?? null) }}</h3><p>{{ t($it['text'] ?? null) }}</p></div>
                        </li>
                    @endforeach
                </ol>
            </div>
        @elseif ($layout === 'cards')
            <div class="rail rail--grid" data-rail style="--cols: {{ min(4, max(2, $n)) }}; --rail-item: min(78%, 300px)">
                <ol class="rail__track phase-cards" data-rail-track tabindex="0" aria-label="{{ plain_title(t($b['title'] ?? null)) }}">
                    @foreach ($items as $ii => $it)
                        <li class="phase">
                            <div class="phase__bar" aria-hidden="true"><i style="inline-size: {{ round(($ii + 1) / max(1, $n) * 100) }}%"></i></div>
                            <span class="phase__num">{{ __('site.phase') }} {{ $ii + 1 }}</span>
                            <h3 class="h3">{{ t($it['title'] ?? null) }}</h3>
                            <p>{{ t($it['text'] ?? null) }}</p>
                        </li>
                    @endforeach
                </ol>
                @include('partials.rail-controls')
            </div>
        @elseif ($layout === 'stairs')
            <ol class="stairs" style="--n: {{ $n }}">
                @foreach ($items as $ii => $it)
                    <li class="stairs__step reveal" style="--i: {{ $ii }}">
                        <div class="stairs__riser" aria-hidden="true"><span>{{ str_pad($ii + 1, 2, '0', STR_PAD_LEFT) }}</span></div>
                        <div class="stairs__text"><h3 class="h4">{{ t($it['title'] ?? null) }}</h3><p>{{ t($it['text'] ?? null) }}</p></div>
                    </li>
                @endforeach
            </ol>
        @elseif ($layout === 'vertical')
            <ol class="vline">
                @foreach ($items as $ii => $it)
                    <li class="vline__item reveal">
                        <span class="vline__dot" aria-hidden="true">{{ $ii + 1 }}</span>
                        <div class="vline__body">
                            <h3 class="h3">{{ t($it['title'] ?? null) }}</h3>
                            <p>{{ t($it['text'] ?? null) }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        @elseif ($layout === 'chevrons')
            <ol class="chev" style="--n: {{ $n }}">
                @foreach ($items as $ii => $it)
                    <li class="chev__step">
                        <div class="chev__arrow"><span class="chev__num">{{ $ii + 1 }}</span><span class="chev__label">{{ t($it['title'] ?? null) }}</span></div>
                        <p>{{ t($it['text'] ?? null) }}</p>
                    </li>
                @endforeach
            </ol>
        @else
            <ol class="tline" style="--n: {{ $n }}">
                @foreach ($items as $ii => $it)
                    <li class="tline__step">
                        <span class="tline__node" aria-hidden="true">{{ str_pad($ii + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div><h3 class="h4">{{ t($it['title'] ?? null) }}</h3><p>{{ t($it['text'] ?? null) }}</p></div>
                    </li>
                @endforeach
            </ol>
        @endif

        @if (t($b['cta_label'] ?? null))
            <div class="proc__cta">@include('partials.cta', ['b' => $b, 'light' => $bg === 'dark'])</div>
        @endif
    </div>
</section>
