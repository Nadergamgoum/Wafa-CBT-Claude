@php $items = $b['items'] ?? []; $bg = $b['background'] ?? 'white'; @endphp
<section class="section eng {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b])
        <div class="eng__table" role="list">
            <div class="eng__row eng__row--head hide-mobile" aria-hidden="true">
                <span>{{ __('site.phase') }}</span><span>{{ __('site.what_happens') }}</span><span>{{ __('site.typical_outputs') }}</span>
            </div>
            @foreach ($items as $ii => $it)
                <div class="eng__row" role="listitem">
                    <div class="eng__phase"><span class="eng__n">{{ $ii + 1 }}</span><h3 class="h4">{{ t($it['title'] ?? null) }}</h3></div>
                    <p class="eng__text">{{ t($it['text'] ?? null) }}</p>
                    <ul class="eng__out">@foreach (lines($it['points'] ?? null) as $p)<li>{{ $p }}</li>@endforeach</ul>
                </div>
            @endforeach
        </div>
    </div>
</section>
