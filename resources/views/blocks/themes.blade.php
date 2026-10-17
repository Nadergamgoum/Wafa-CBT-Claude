@php $items = $b['items'] ?? []; $bg = $b['background'] ?? 'dark'; @endphp
<section class="section themes {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title" data-accent="teal">
    <div class="container">
        @include('partials.shead', ['b' => $b])
        <ol class="themes__grid" data-more>
            @foreach ($items as $ii => $it)
                <li class="themes__item" @if($ii >= 4) data-more-extra @endif>
                    <span class="themes__num">{{ ['I','II','III','IV','V','VI','VII','VIII','IX'][$ii] ?? $ii + 1 }}</span>
                    <h3 class="h3">{{ t($it['title'] ?? null) }}</h3>
                    <p>{{ t($it['text'] ?? null) }}</p>
                </li>
            @endforeach
            @if (count($items) > 4)
                <li class="themes__more"><button type="button" class="more-btn" data-more-btn data-more="{{ __('site.show_more') }}" data-less="{{ __('site.show_less') }}" hidden><span>{{ __('site.show_more') }}</span>{!! icon('chevron-down') !!}</button></li>
            @endif
        </ol>
    </div>
</section>
