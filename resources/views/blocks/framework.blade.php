@php $items = $b['items'] ?? []; $bg = $b['background'] ?? 'white'; @endphp
<section class="section fw {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'center'])
        <div class="fw__triad" aria-hidden="true">
            @foreach ($items as $ii => $it)
                <span class="fw__ball fw__ball--{{ $ii + 1 }}">{{ t($it['letter'] ?? null) ?: mb_substr(t($it['title'] ?? null), 0, 1) }}</span>
            @endforeach
        </div>
        <div class="fw__cols" data-tabs>
            <div class="fw__tabs tabs__list" role="tablist" aria-label="{{ plain_title(t($b['title'] ?? null)) }}">
                @foreach ($items as $ii => $it)
                    <button type="button" class="tab" role="tab" id="{{ $bid }}-t{{ $ii }}" aria-controls="{{ $bid }}-p{{ $ii }}" aria-selected="{{ $ii === 0 ? 'true' : 'false' }}" tabindex="{{ $ii === 0 ? 0 : -1 }}">{{ t($it['title'] ?? null) }}</button>
                @endforeach
            </div>
            @foreach ($items as $ii => $it)
                <article class="fw__col fw__col--{{ $ii + 1 }}" role="tabpanel" id="{{ $bid }}-p{{ $ii }}" aria-labelledby="{{ $bid }}-t{{ $ii }}" @if($ii !== 0) hidden @endif>
                    <span class="fw__letter" aria-hidden="true">{{ t($it['letter'] ?? null) ?: mb_substr(t($it['title'] ?? null), 0, 1) }}</span>
                    <h3 class="h3">{{ t($it['title'] ?? null) }}</h3>
                    <p>{{ t($it['text'] ?? null) }}</p>
                    @if ($pts = lines($it['points'] ?? null))<ul class="fw__pts">@foreach ($pts as $p)<li>{{ $p }}</li>@endforeach</ul>@endif
                </article>
            @endforeach
        </div>
    </div>
</section>
