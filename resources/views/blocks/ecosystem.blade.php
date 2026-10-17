@php
    $items = array_slice($b['items'] ?? [], 0, 8);
    $n = max(1, count($items));
    $bg = $b['background'] ?? 'white';
    $r = 41; // node orbit radius (% of diagram)
@endphp
<section class="section eco {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container eco__grid">
        <div class="eco__copy">
            @include('partials.shead', ['b' => $b])
            <dl class="eco__defs" data-acc>
                @foreach ($items as $ii => $it)
                    <div class="eco__def">
                        <dt>
                            <button type="button" class="eco__def-btn" aria-expanded="false" aria-controls="{{ $bid }}-d{{ $ii }}" data-acc-btn>
                                <span class="icon-tile">{!! icon($it['icon'] ?? 'circle-check') !!}</span>{{ t($it['title'] ?? null) }}
                                <span class="acc__sign" aria-hidden="true"></span>
                            </button>
                            <span class="eco__def-title"><span class="icon-tile">{!! icon($it['icon'] ?? 'circle-check') !!}</span>{{ t($it['title'] ?? null) }}</span>
                        </dt>
                        <dd id="{{ $bid }}-d{{ $ii }}" hidden>{{ t($it['text'] ?? null) }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>
        <div class="eco__diagram" aria-hidden="true">
            <svg class="eco__lines" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="{{ $r }}" fill="none" stroke="currentColor" stroke-width=".25" stroke-dasharray="1 1.4"/>
                <circle cx="50" cy="50" r="27" fill="none" stroke="currentColor" stroke-width=".18"/>
                @foreach ($items as $ii => $it)
                    @php $a = deg2rad(-90 + 360 / $n * $ii); @endphp
                    <line x1="50" y1="50" x2="{{ round(50 + $r * cos($a), 2) }}" y2="{{ round(50 + $r * sin($a), 2) }}" stroke="currentColor" stroke-width=".22"/>
                @endforeach
            </svg>
            <div class="eco__center"><strong>{{ t($b['center_label'] ?? null) }}</strong>@if($ct = t($b['center_text'] ?? null))<span>{{ $ct }}</span>@endif</div>
            @foreach ($items as $ii => $it)
                @php $a = deg2rad(-90 + 360 / $n * $ii); @endphp
                <div class="eco__node" style="--x: {{ round(50 + $r * cos($a), 2) }}%; --y: {{ round(50 + $r * sin($a), 2) }}%">
                    <span class="eco__node-ico">{!! icon($it['icon'] ?? 'circle-check') !!}</span>
                    <span class="eco__node-label">{{ t($it['title'] ?? null) }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
