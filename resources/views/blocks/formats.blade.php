@php $items = $b['items'] ?? []; $bg = $b['background'] ?? 'ivory'; @endphp
<section class="section fmt {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'split'])
        <ul class="fmt__grid">
            @foreach ($items as $ii => $it)
                <li class="fmt__card">
                    <span class="fmt__ico">{!! icon($it['icon'] ?? 'presentation', 'icon icon--lg') !!}</span>
                    <div><h3 class="h4">{{ t($it['title'] ?? null) }}</h3><p>{{ t($it['text'] ?? null) }}</p></div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
