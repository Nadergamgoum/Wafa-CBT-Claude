@php $items = $b['items'] ?? []; $n = count($items); $bg = $b['background'] ?? 'white'; @endphp
<section class="section trans {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'center'])
        <ol class="trans__flow" style="--n: {{ $n }}">
            @foreach ($items as $ii => $it)
                <li class="trans__stage" style="--i: {{ $ii }}; --t: {{ $n > 1 ? round($ii / ($n - 1), 3) : 1 }}">
                    <div class="trans__cap">
                        <span class="trans__shape" aria-hidden="true"></span>
                        <span class="trans__step">{{ str_pad($ii + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="h3">{{ t($it['title'] ?? null) }}</h3>
                    </div>
                    <p>{{ t($it['text'] ?? null) }}</p>
                    @if ($pts = lines($it['points'] ?? null))<ul class="trans__pts">@foreach ($pts as $p)<li>{{ $p }}</li>@endforeach</ul>@endif
                    @if ($ii < $n - 1)<span class="trans__arrow" aria-hidden="true">{!! icon('arrow-right', 'icon flip-rtl') !!}</span>@endif
                </li>
            @endforeach
        </ol>
    </div>
</section>
