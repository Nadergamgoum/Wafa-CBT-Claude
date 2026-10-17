@php
    $layout = $b['layout'] ?? 'shield';
    $items = $b['items'] ?? [];
    $bg = $b['background'] ?? 'white';
@endphp
<section class="section cov cov--{{ $layout }} {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @if ($layout === 'compare')
            @include('partials.shead', ['b' => $b, 'align' => 'center'])
            <div class="cov__compare" style="--n: {{ count($items) }}">
                @foreach ($items as $ii => $it)
                    <div class="cov__col {{ $ii === 0 ? 'is-lead' : '' }}">
                        <span class="icon-tile">{!! icon($it['icon'] ?? 'car') !!}</span>
                        <h3 class="h3">{{ t($it['title'] ?? null) }}</h3>
                        <p>{{ t($it['text'] ?? null) }}</p>
                        @if ($pts = lines($it['points'] ?? null))<ul class="checks">@foreach ($pts as $p)<li>{{ $p }}</li>@endforeach</ul>@endif
                    </div>
                @endforeach
            </div>
        @elseif ($layout === 'assets')
            @include('partials.shead', ['b' => $b, 'align' => 'split'])
            <ul class="cov__assets">
                @foreach ($items as $ii => $it)
                    <li class="cov__asset cov__asset--{{ $ii % 5 }}">
                        <span class="cov__asset-ico">{!! icon($it['icon'] ?? 'building-2', 'icon icon--lg') !!}</span>
                        <h3 class="h4">{{ t($it['title'] ?? null) }}</h3>
                        <p>{{ t($it['text'] ?? null) }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="cov__shield-grid">
                <div>
                    @include('partials.shead', ['b' => $b])
                    <div class="cov__emblem" aria-hidden="true">{!! icon('shield-check') !!}</div>
                </div>
                <div class="acc cov__acc" data-acc>
                    @foreach ($items as $ii => $it)
                        <div class="acc__item">
                            <h3 class="acc__h">
                                <button type="button" class="acc__btn" aria-expanded="{{ $ii < 1 ? 'true' : 'false' }}" aria-controls="{{ $bid }}-c{{ $ii }}" data-acc-btn>
                                    <span class="cov__label"><span class="icon-tile">{!! icon($it['icon'] ?? 'shield') !!}</span>{{ t($it['title'] ?? null) }}</span><span class="acc__sign" aria-hidden="true"></span>
                                </button>
                            </h3>
                            <div class="acc__panel" id="{{ $bid }}-c{{ $ii }}" @if($ii >= 1) hidden @endif>
                                <p>{{ t($it['text'] ?? null) }}</p>
                                @if ($pts = lines($it['points'] ?? null))<ul class="checks">@foreach ($pts as $p)<li>{{ $p }}</li>@endforeach</ul>@endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @if ($note = t($b['note'] ?? null))<p class="cov__note">{!! icon('info') !!}<span>{{ $note }}</span></p>@endif
    </div>
</section>
