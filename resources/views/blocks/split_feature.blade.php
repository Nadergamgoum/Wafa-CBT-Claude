@php
    $img = media_find($b['image'] ?? null);
    $side = $b['image_side'] ?? 'end';
    $bg = $b['background'] ?? 'white';
    $points = lines($b['points'] ?? null);
@endphp
<section class="section split {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }} split--img-{{ $side }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container split__grid">
        <div class="split__copy">
            @include('partials.shead', ['b' => $b])
            @if ($body = t($b['body'] ?? null))<div class="split__body">{!! nl2br(e($body)) !!}</div>@endif
            @if ($points)<ul class="checks split__points">@foreach ($points as $p)<li>{{ $p }}</li>@endforeach</ul>@endif
            @include('partials.cta', ['b' => $b, 'light' => $bg === 'dark'])
        </div>
        <div class="split__media">
            <div class="frame frame--4x5 frame--m-16x9">@include('components.media', ['media' => $img, 'fallback' => art($b['art'] ?? 'people'), 'sizes' => '(min-width:1024px) 44vw, 100vw'])</div>
            @if ($at = t($b['aside_title'] ?? null))
                <div class="split__aside">
                    <strong>{{ $at }}</strong>
                    @if ($ax = t($b['aside_text'] ?? null))<p>{{ $ax }}</p>@endif
                </div>
            @endif
        </div>
    </div>
</section>
