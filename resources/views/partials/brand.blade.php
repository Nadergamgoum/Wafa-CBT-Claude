@php
    $light = $light ?? false;
    $logo = \App\Support\Brand::logoUrl($light);
    $name = t(setting('general.site_name')) ?: 'WAFA';
@endphp
<a class="brand {{ $light ? 'brand--light' : '' }}" href="{{ lroute('home') }}" aria-label="{{ $name }} — {{ __('site.home') }}">
    <img src="{{ $logo }}" alt="{{ $name }}" width="210" height="44" decoding="async" @if (! $light) fetchpriority="high" @endif>
</a>
