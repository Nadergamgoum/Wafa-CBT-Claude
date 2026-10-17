@php
    $items = $b['items'] ?? [];
    $total = max(1, collect($items)->max(fn ($i) => (int) ($i['start'] ?? 0) + max(1, (int) ($i['span'] ?? 1))));
    $bg = $b['background'] ?? 'white';
@endphp
<section class="section road {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b])
        <ol class="road__chart" style="--total: {{ $total }}">
            @foreach ($items as $ii => $it)
                @php $start = (int) ($it['start'] ?? $ii); $span = max(1, (int) ($it['span'] ?? 1)); @endphp
                <li class="road__row">
                    <div class="road__label"><span class="road__n">{{ $ii + 1 }}</span><div><h3 class="h4">{{ t($it['title'] ?? null) }}</h3><p>{{ t($it['text'] ?? null) }}</p></div></div>
                    <div class="road__track" aria-hidden="true"><span class="road__bar" style="--s: {{ $start }}; --w: {{ $span }}; --i: {{ $ii }}"></span></div>
                </li>
            @endforeach
        </ol>
        <p class="road__legend small muted">{!! icon('info') !!} {{ __('site.roadmap_note') }}</p>
    </div>
</section>
