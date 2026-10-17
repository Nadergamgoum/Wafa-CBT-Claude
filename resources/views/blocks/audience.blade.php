@php $items = $b['items'] ?? []; $bg = $b['background'] ?? 'white'; @endphp
<section class="section aud {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b])
        <div class="rail rail--grid" data-rail style="--cols: {{ min(3, max(2, count($items))) }}; --rail-item: min(78%, 300px)">
            <ul class="rail__track" data-rail-track tabindex="0" aria-label="{{ plain_title(t($b['title'] ?? null)) }}">
                @foreach ($items as $ii => $it)
                    <li class="persona">
                        <span class="persona__avatar">{!! icon($it['icon'] ?? 'user-round', 'icon icon--lg') !!}</span>
                        <h3 class="h3">{{ t($it['title'] ?? null) }}</h3>
                        <p>{{ t($it['text'] ?? null) }}</p>
                    </li>
                @endforeach
            </ul>
            @include('partials.rail-controls')
        </div>
    </div>
</section>
