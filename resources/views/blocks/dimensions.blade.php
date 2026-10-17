@php
    $items = $b['items'] ?? [];
    $n = max(3, count($items));
    $bg = $b['background'] ?? 'mist';
    $pt = fn ($r, $k) => round(100 + $r * cos(deg2rad(-90 + 360 / $n * $k)), 1).','.round(100 + $r * sin(deg2rad(-90 + 360 / $n * $k)), 1);
    $ring = fn ($r) => implode(' ', array_map(fn ($k) => $pt($r, $k), range(0, $n - 1)));
    // Decorative profile shape only — it does not represent measured data.
    $shape = implode(' ', array_map(fn ($k) => $pt([62, 48, 70, 40, 56, 66, 52, 44][$k % 8], $k), range(0, $n - 1)));
@endphp
<section class="section dims {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container dims__grid">
        <div>
            @include('partials.shead', ['b' => $b])
            <svg class="dims__radar" viewBox="0 0 200 200" aria-hidden="true">
                @foreach ([80, 60, 40, 20] as $rr)
                    <polygon fill="none" stroke="currentColor" stroke-width=".6" opacity=".45" points="{{ $ring($rr) }}"/>
                @endforeach
                @for ($k = 0; $k < $n; $k++)
                    <line x1="100" y1="100" x2="{{ explode(',', $pt(80, $k))[0] }}" y2="{{ explode(',', $pt(80, $k))[1] }}" stroke="currentColor" stroke-width=".5" opacity=".4"/>
                @endfor
                <polygon class="dims__shape" points="{{ $shape }}"/>
            </svg>
        </div>
        <ul class="dims__list">
            @foreach ($items as $ii => $it)
                <li>
                    <span class="icon-tile">{!! icon($it['icon'] ?? 'scan-search') !!}</span>
                    <div><h3 class="h4">{{ t($it['title'] ?? null) }}</h3><p>{{ t($it['text'] ?? null) }}</p></div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
