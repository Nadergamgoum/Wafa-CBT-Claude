@php $items = array_slice($b['items'] ?? [], 0, 4); $bg = $b['background'] ?? 'mist'; @endphp
<section class="section qmodel {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'center'])
        <div class="qmodel__wrap">
            <div class="qmodel__core" aria-hidden="true">
                <svg viewBox="0 0 120 120"><circle cx="60" cy="60" r="56" fill="none" stroke="currentColor" stroke-width="1" stroke-dasharray="2 4"/><path d="M60 4a56 56 0 0 1 56 56" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>
                <span>{{ t($b['center_label'] ?? null) }}</span>
            </div>
            <ol class="qmodel__grid">
                @foreach ($items as $ii => $it)
                    <li class="qmodel__q qmodel__q--{{ $ii + 1 }}">
                        <div class="qmodel__head">
                            <span class="icon-tile">{!! icon($it['icon'] ?? 'circle-check') !!}</span>
                            <span class="qmodel__step">{{ str_pad($ii + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <h3 class="h3">{{ t($it['title'] ?? null) }}</h3>
                        <p>{{ t($it['text'] ?? null) }}</p>
                        @if ($pts = lines($it['points'] ?? null))
                            <ul class="qmodel__pts">@foreach ($pts as $p)<li>{{ $p }}</li>@endforeach</ul>
                        @endif
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</section>
