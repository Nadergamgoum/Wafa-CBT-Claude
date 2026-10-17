@php $items = $b['items'] ?? []; $bg = $b['background'] ?? 'dark'; @endphp
<section class="section riskb {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container riskb__grid">
        @include('partials.shead', ['b' => $b])
        <ul class="riskb__list">
            @foreach ($items as $ii => $it)
                <li>
                    <span class="riskb__ico">{!! icon($it['icon'] ?? 'triangle-alert') !!}</span>
                    <span><strong>{{ t($it['title'] ?? null) }}</strong>@if($tx = t($it['text'] ?? null))<small>{{ $tx }}</small>@endif</span>
                </li>
            @endforeach
        </ul>
    </div>
</section>
