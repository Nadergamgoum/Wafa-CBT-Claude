@php $img = media_find($b['image'] ?? null); $bg = $b['background'] ?? 'mist'; @endphp
@if ($q = t($b['quote'] ?? null))
<section class="section pquote {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-label="{{ t($b['eyebrow'] ?? null) ?: plain_title($q) }}">
    <div class="container pquote__inner {{ $img ? 'has-img' : '' }}">
        @if ($img)<div class="pquote__img">@include('components.media', ['media' => $img, 'sizes' => '120px', 'widths' => 480])</div>@endif
        <figure>
            @if ($e = t($b['eyebrow'] ?? null))<p class="eyebrow">{{ $e }}</p>@endif
            <blockquote><p>{{ $q }}</p></blockquote>
            @if ($a = t($b['author'] ?? null))<figcaption><strong>{{ $a }}</strong>@if($r = t($b['role'] ?? null))<span>{{ $r }}</span>@endif</figcaption>@endif
        </figure>
    </div>
</section>
@endif
