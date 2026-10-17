@php
    $layout = $b['layout'] ?? 'grid';
    $items = collect($b['items'] ?? [])->filter(fn ($it) => t($it['title'] ?? null) !== '')->values();
    $bg = $b['background'] ?? 'white';
    $count = $items->count();
@endphp
@if ($count)
<section class="section cards cards--{{ $layout }} {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => $layout === 'list' ? 'start' : 'split'])
        @if ($layout === 'list')
            <ul class="cards__list">
                @foreach ($items as $it)
                    <li class="reveal">
                        <span class="icon-tile">{!! icon($it['icon'] ?? 'check') !!}</span>
                        <div>
                            <h3 class="h4">{{ t($it['title'] ?? null) }}</h3>
                            @if ($tx = t($it['text'] ?? null))<p>{{ $tx }}</p>@endif
                            @if (($lk = $it['link'] ?? null) && ($ll = t($it['link_label'] ?? null)))<a class="link-arrow" href="{{ link_url($lk) }}">{{ $ll }} {!! icon('arrow-right', 'icon flip-rtl') !!}</a>@endif
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="rail {{ $layout === 'grid' ? 'rail--grid' : '' }}" data-rail style="--cols: {{ $count >= 4 && $count % 3 !== 0 ? 4 : 3 }}; --rail-item: min(82%, 340px)">
                <ul class="rail__track" data-rail-track tabindex="0" aria-label="{{ plain_title(t($b['title'] ?? null)) }}">
                    @foreach ($items as $it)
                        @php $img = media_find($it['image'] ?? null); $lk = $it['link'] ?? null; @endphp
                        <li>
                            <article class="card xcard">
                                @if ($img)<div class="card__media">@include('components.media', ['media' => $img, 'alt' => '', 'sizes' => '340px', 'widths' => 960])</div>@endif
                                <div class="card__body">
                                    @unless ($img)<span class="icon-tile">{!! icon($it['icon'] ?? 'sparkles') !!}</span>@endunless
                                    <h3 class="card__title">@if ($lk)<a href="{{ link_url($lk) }}">{{ t($it['title'] ?? null) }}</a>@else{{ t($it['title'] ?? null) }}@endif</h3>
                                    @if ($tx = t($it['text'] ?? null))<p>{{ $tx }}</p>@endif
                                    @if ($lk && ($ll = t($it['link_label'] ?? null)))<span class="link-arrow card__foot">{{ $ll }} {!! icon('arrow-right', 'icon flip-rtl') !!}</span>@endif
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
                @include('partials.rail-controls')
            </div>
        @endif
        @include('partials.cta', ['b' => $b, 'light' => $bg === 'dark'])
    </div>
</section>
@endif
