@php $items = $b['items'] ?? []; $bg = $b['background'] ?? 'white'; @endphp
<section class="section focus {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container focus__grid">
        @include('partials.shead', ['b' => $b])
        <ul class="focus__tags">
            @foreach ($items as $ii => $it)
                <li class="focus__tag focus__tag--{{ $ii % 3 }}">
                    <span class="focus__ico">{!! icon($it['icon'] ?? 'target') !!}</span>
                    <span><strong>{{ t($it['title'] ?? null) }}</strong>@if($tx = t($it['text'] ?? null))<small>{{ $tx }}</small>@endif</span>
                </li>
            @endforeach
        </ul>
    </div>
</section>
