@php $img = media_find($b['image'] ?? null); $items = $b['items'] ?? []; $bg = $b['background'] ?? 'ivory'; @endphp
<section class="section stmt {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        <div class="stmt__top">
            <div>
                @if ($e = t($b['eyebrow'] ?? null))<p class="eyebrow">{{ $e }}</p>@endif
                <h2 class="h2" id="{{ $bid }}-title">{!! rich_title(t($b['title'] ?? null)) !!}</h2>
            </div>
            <blockquote class="stmt__quote"><p>{{ t($b['statement'] ?? null) }}</p></blockquote>
        </div>
        <div class="stmt__grid">
            <div class="frame frame--3x2 stmt__media">@include('components.media', ['media' => $img, 'fallback' => art($b['art'] ?? 'life-detail'), 'sizes' => '(min-width:1024px) 40vw, 100vw'])</div>
            <ul class="stmt__points">
                @foreach ($items as $it)
                    <li class="reveal">
                        <span class="icon-tile">{!! icon($it['icon'] ?? 'shield') !!}</span>
                        <div><h3 class="h4">{{ t($it['title'] ?? null) }}</h3><p>{{ t($it['text'] ?? null) }}</p></div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
