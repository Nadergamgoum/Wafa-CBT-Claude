@php $items = $b['items'] ?? []; $bg = $b['background'] ?? 'white'; @endphp
<section class="section exp {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'split'])
        <div class="exp__tabs" data-tabs>
            <div class="exp__list" role="tablist" aria-orientation="vertical" aria-label="{{ plain_title(t($b['title'] ?? null)) }}">
                @foreach ($items as $ii => $it)
                    <button type="button" role="tab" class="exp__tab" id="{{ $bid }}-t{{ $ii }}" aria-controls="{{ $bid }}-p{{ $ii }}" aria-selected="{{ $ii === 0 ? 'true' : 'false' }}" tabindex="{{ $ii === 0 ? '0' : '-1' }}">
                        <span class="exp__idx">{{ $ii + 1 }}</span>
                        <span class="exp__ico">{!! icon($it['icon'] ?? 'user-round') !!}</span>
                        <span class="exp__label">{{ t($it['title'] ?? null) }}</span>
                    </button>
                @endforeach
            </div>
            <div class="exp__panels">
                @foreach ($items as $ii => $it)
                    <div class="exp__panel" role="tabpanel" id="{{ $bid }}-p{{ $ii }}" aria-labelledby="{{ $bid }}-t{{ $ii }}" tabindex="0" @if($ii !== 0) hidden @endif>
                        <span class="exp__panel-ico">{!! icon($it['icon'] ?? 'user-round', 'icon icon--lg') !!}</span>
                        <p class="exp__moment">{{ __('site.moment') }} {{ $ii + 1 }} / {{ count($items) }}</p>
                        <h3 class="h2">{{ t($it['title'] ?? null) }}</h3>
                        <p class="lead">{{ t($it['text'] ?? null) }}</p>
                        @if ($pts = lines($it['points'] ?? null))
                            <ul class="checks">@foreach ($pts as $p)<li>{{ $p }}</li>@endforeach</ul>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
