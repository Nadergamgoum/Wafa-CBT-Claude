@php $items = $b['items'] ?? []; $bg = $b['background'] ?? 'dark'; @endphp
<section class="section outc {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container outc__grid">
        @include('partials.shead', ['b' => $b])
        <ul class="outc__list">
            @foreach ($items as $it)
                <li><span class="outc__check" aria-hidden="true">{!! icon('check') !!}</span><div><strong>{{ t($it['title'] ?? null) }}</strong>@if($tx = t($it['text'] ?? null))<p>{{ $tx }}</p>@endif</div></li>
            @endforeach
        </ul>
    </div>
</section>
