@php $items = \App\Support\Content::testimonials(); $bg = $b['background'] ?? 'ivory'; @endphp
@if ($items->isNotEmpty())
<section class="section testi {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b])
        <div class="rail" data-rail style="--rail-item: min(86%, 440px)">
            <ul class="rail__track" data-rail-track tabindex="0" aria-label="{{ plain_title(t($b['title'] ?? null)) }}">
                @foreach ($items as $tm)
                    <li class="testi__card">
                        {!! icon('quote', 'icon icon--lg') !!}
                        <blockquote><p>{{ t($tm->quote) }}</p></blockquote>
                        <p class="testi__who"><strong>{{ $tm->author_name }}</strong>@if(t($tm->author_role) || $tm->company)<span>{{ trim(t($tm->author_role).($tm->company ? ', '.$tm->company : ''), ', ') }}</span>@endif</p>
                    </li>
                @endforeach
            </ul>
            @include('partials.rail-controls')
        </div>
    </div>
</section>
@endif
