@php
    $layout = $b['layout'] ?? 'numbered';
    $items = $b['items'] ?? [];
    $bg = $b['background'] ?? ($layout === 'tiles' ? 'dark' : 'white');
@endphp
<section class="section chal chal--{{ $layout }} {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @if ($layout === 'numbered')
            <div class="chal__split">
                <div class="chal__aside">@include('partials.shead', ['b' => $b])</div>
                <ol class="chal__list" data-more>
                    @foreach ($items as $ii => $it)
                        <li class="reveal" @if($ii >= 3) data-more-extra @endif>
                            <span class="chal__num" aria-hidden="true">{{ str_pad($ii + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <div><h3 class="h3">{{ t($it['title'] ?? null) }}</h3><p>{{ t($it['text'] ?? null) }}</p></div>
                        </li>
                    @endforeach
                    @if (count($items) > 3)
                        <li class="chal__more"><button type="button" class="more-btn" data-more-btn data-more="{{ __('site.show_more') }}" data-less="{{ __('site.show_less') }}" hidden><span>{{ __('site.show_more') }}</span>{!! icon('chevron-down') !!}</button></li>
                    @endif
                </ol>
            </div>
        @elseif ($layout === 'grid')
            @include('partials.shead', ['b' => $b, 'align' => 'split'])
            <div class="rail rail--grid" data-rail style="--cols: {{ min(3, max(2, count($items))) }}">
                <div class="rail__track" data-rail-track tabindex="0" aria-label="{{ plain_title(t($b['title'] ?? null)) }}">
                    @foreach ($items as $it)
                        <article class="chal__card">
                            <span class="icon-tile">{!! icon($it['icon'] ?? 'info') !!}</span>
                            <h3 class="h4">{{ t($it['title'] ?? null) }}</h3>
                            <p>{{ t($it['text'] ?? null) }}</p>
                        </article>
                    @endforeach
                </div>
                @include('partials.rail-controls')
            </div>
        @elseif ($layout === 'statements')
            @include('partials.shead', ['b' => $b])
            <div class="chal__statements">
                @foreach ($items as $it)
                    <div class="chal__statement reveal">
                        <span class="icon-tile">{!! icon($it['icon'] ?? 'info') !!}</span>
                        <h3 class="h3">{{ t($it['title'] ?? null) }}</h3>
                        <p>{{ t($it['text'] ?? null) }}</p>
                    </div>
                @endforeach
            </div>
        @else
            @include('partials.shead', ['b' => $b, 'align' => 'split'])
            <ul class="chal__tiles">
                @foreach ($items as $it)
                    <li class="chal__tile">
                        <span class="chal__tile-ico">{!! icon($it['icon'] ?? 'triangle-alert') !!}</span>
                        <h3 class="h4">{{ t($it['title'] ?? null) }}</h3>
                        @if ($tx = t($it['text'] ?? null))<p>{{ $tx }}</p>@endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</section>
