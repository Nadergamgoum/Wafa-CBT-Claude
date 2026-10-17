{{--
    Responsive image. Uses generated WebP variants when the image comes from the
    media library; otherwise falls back to the built-in editorial artwork.
    Params: media (?Media), fallback (url), alt, sizes, class, eager (bool), widths (int)
--}}
@php
    $eager = $eager ?? false;
    $sizes = $sizes ?? '100vw';
    $class = $class ?? '';
    $altText = isset($alt) && $alt !== null ? $alt : ($media?->altText() ?? '');
@endphp
@if ($media && $media->isImage())
    @php $set = $media->srcset('webp'); $avif = $media->srcset('avif'); @endphp
    <picture>
        @if ($avif)<source type="image/avif" srcset="{{ $avif }}" sizes="{{ $sizes }}">@endif
        @if ($set)<source type="image/webp" srcset="{{ $set }}" sizes="{{ $sizes }}">@endif
        <img src="{{ $media->url($widths ?? 1200) }}" alt="{{ $altText }}" @if($media->width) width="{{ $media->width }}" height="{{ $media->height }}" @endif
             class="{{ $class }}" style="object-position: {{ $media->focal_point ?: '50% 50%' }}"
             @if($eager) fetchpriority="high" @else loading="lazy" @endif decoding="async">
    </picture>
@elseif (! empty($fallback))
    <img src="{{ $fallback }}" alt="{{ $altText }}" class="{{ $class }}" width="1200" height="900" @if($eager) fetchpriority="high" @else loading="lazy" @endif decoding="async">
@endif
