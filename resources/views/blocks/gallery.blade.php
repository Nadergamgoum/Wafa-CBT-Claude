@php
    $items = collect($b['items'] ?? [])->map(fn ($it) => ['media' => media_find($it['image'] ?? null), 'caption' => $it['caption'] ?? null])
        ->filter(fn ($it) => $it['media'] && $it['media']->isImage())->values();
    $bg = $b['background'] ?? 'white';
@endphp
@if ($items->isNotEmpty())
<section class="section {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'split'])
        @include('partials.gallery', ['items' => $items, 'gid' => $bid, 'layout' => $b['layout'] ?? 'grid'])
        @include('partials.cta', ['b' => $b, 'light' => $bg === 'dark'])
    </div>
</section>
@endif
