{{-- Reporting showcase: an illustrative dashboard frame (no figures) beside the report types. --}}
@php $items = $b['items'] ?? []; $bg = $b['background'] ?? 'white'; @endphp
<section class="section rep {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container rep__grid">
        <div class="rep__copy">
            @include('partials.shead', ['b' => $b])
            <ul class="rep__list">
                @foreach ($items as $it)
                    <li class="reveal">
                        <span class="icon-tile">{!! icon($it['icon'] ?? 'chart-column') !!}</span>
                        <div>
                            <h3 class="h4">{{ t($it['title'] ?? null) }}</h3>
                            @if ($tx = t($it['text'] ?? null))<p>{{ $tx }}</p>@endif
                            @if ($pts = lines($it['points'] ?? null))<ul class="rep__tags">@foreach ($pts as $p)<li>{{ $p }}</li>@endforeach</ul>@endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="rep__board" aria-hidden="true">
            <div class="rep__bar"><span></span><span></span><span></span><strong>{{ t($b['panel_title'] ?? null) }}</strong></div>
            <div class="rep__tiles">
                @foreach (array_slice($items, 0, 3) as $it)
                    <div class="rep__tile"><span class="rep__ico">{!! icon($it['icon'] ?? 'chart-column') !!}</span><span class="rep__label">{{ t($it['title'] ?? null) }}</span><span class="rep__line"></span><span class="rep__line rep__line--s"></span></div>
                @endforeach
            </div>
            <div class="rep__chart">
                <svg viewBox="0 0 320 120" preserveAspectRatio="none"><path d="M0 96 L40 84 L80 88 L120 62 L160 70 L200 46 L240 52 L280 30 L320 36" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/><path d="M0 96 L40 84 L80 88 L120 62 L160 70 L200 46 L240 52 L280 30 L320 36 L320 120 L0 120Z" fill="currentColor" opacity=".12"/></svg>
                <div class="rep__cols">@foreach ([40, 64, 52, 78, 60, 88] as $h)<span style="--h: {{ $h }}%"></span>@endforeach</div>
            </div>
        </div>
    </div>
</section>
