@php $items = $b['items'] ?? []; $bg = $b['background'] ?? 'ivory'; @endphp
<section class="section areas {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'split'])
        <ol class="areas__list" data-more>
            @foreach ($items as $ii => $it)
                <li class="areas__item" @if($ii >= 4) data-more-extra @endif>
                    <span class="areas__num">{{ str_pad($ii + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <h3 class="h4">{{ t($it['title'] ?? null) }}</h3>
                    <p>{{ t($it['text'] ?? null) }}</p>
                </li>
            @endforeach
            @if (count($items) > 4)
                <li class="areas__more"><button type="button" class="more-btn" data-more-btn data-more="{{ __('site.show_more') }}" data-less="{{ __('site.show_less') }}" hidden><span>{{ __('site.show_more') }}</span>{!! icon('chevron-down') !!}</button></li>
            @endif
        </ol>
    </div>
</section>
