@php
    $photo = media_find($b['photo'] ?? null);
    $bg = $b['background'] ?? 'ivory';
    $points = lines($b['points'] ?? null);
    $name = t($b['name'] ?? null);
@endphp
<section class="section founder {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container founder__grid">
        <div class="founder__media">
            <div class="founder__frame">@include('components.media', ['media' => $photo, 'fallback' => art($b['art'] ?? 'person'), 'alt' => $name, 'sizes' => '(min-width:1024px) 360px, 70vw', 'widths' => 960])</div>
        </div>
        <div class="founder__copy">
            @if ($e = t($b['eyebrow'] ?? null))<p class="eyebrow">{{ $e }}</p>@endif
            @if ($tt = t($b['title'] ?? null))<h2 class="h2" id="{{ $bid }}-title">{!! rich_title($tt) !!}</h2>@endif
            @if ($name)
                <p class="founder__name" @unless($tt) id="{{ $bid }}-title" @endunless><strong>{{ $name }}</strong>@if ($r = t($b['role'] ?? null))<span>{{ $r }}</span>@endif</p>
            @endif
            @if ($q = t($b['quote'] ?? null))<blockquote class="founder__quote"><p>{{ $q }}</p></blockquote>@endif
            @if ($bio = t($b['bio'] ?? null))<div class="founder__bio">{!! nl2br(e($bio)) !!}</div>@endif
            @if ($points)<ul class="checks">@foreach ($points as $p)<li>{{ $p }}</li>@endforeach</ul>@endif
            @include('partials.cta', ['b' => $b, 'light' => $bg === 'dark'])
        </div>
    </div>
</section>
