@php $items = collect($b['items'] ?? [])->filter(fn ($it) => t($it['title'] ?? null) !== '')->values(); $bg = $b['background'] ?? 'white'; @endphp
@if ($items->isNotEmpty())
<section class="section accb {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container faq__grid">
        <div class="faq__aside">
            @include('partials.shead', ['b' => $b])
            @include('partials.cta', ['b' => $b, 'light' => $bg === 'dark'])
        </div>
        <div class="acc" data-acc>
            @foreach ($items as $ai => $it)
                <div class="acc__item">
                    <h3 class="acc__h">
                        <button type="button" class="acc__btn" id="{{ $bid }}-h{{ $ai }}" aria-expanded="{{ $ai === 0 ? 'true' : 'false' }}" aria-controls="{{ $bid }}-p{{ $ai }}" data-acc-btn>
                            <span>{{ t($it['title'] ?? null) }}</span><span class="acc__sign" aria-hidden="true"></span>
                        </button>
                    </h3>
                    <div class="acc__panel" id="{{ $bid }}-p{{ $ai }}" role="region" aria-labelledby="{{ $bid }}-h{{ $ai }}" @if($ai !== 0) hidden @endif>
                        @if ($tx = t($it['text'] ?? null))<p>{!! nl2br(e($tx)) !!}</p>@endif
                        @if ($pts = lines($it['points'] ?? null))<ul class="checks">@foreach ($pts as $p)<li>{{ $p }}</li>@endforeach</ul>@endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
