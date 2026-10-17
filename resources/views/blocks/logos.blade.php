{{-- Only logos uploaded in the CMS (with approval) are shown; hidden when empty. --}}
@php
    $items = collect($b['items'] ?? [])->map(fn ($it) => $it + ['m' => media_find($it['image'] ?? null)])->filter(fn ($it) => $it['m'])->values();
    $bg = $b['background'] ?? 'white';
@endphp
@if ($items->isNotEmpty())
<section class="section logos {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'center'])
        <ul class="logos__grid" aria-label="{{ plain_title(t($b['title'] ?? null)) ?: __('site.logos') }}">
            @foreach ($items as $it)
                @php $name = t($it['name'] ?? null); $url = $it['url'] ?? null; @endphp
                <li>
                    @if ($url)<a href="{{ link_url($url) }}" target="_blank" rel="noopener">@endif
                    <img src="{{ $it['m']->url(480) }}" alt="{{ $name ?: $it['m']->altText() }}" loading="lazy" decoding="async" @if($it['m']->width) width="{{ $it['m']->width }}" height="{{ $it['m']->height }}" @endif>
                    @if ($url)</a>@endif
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endif
