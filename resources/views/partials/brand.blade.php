@php $logo = \App\Support\Brand::logoUrl($light ?? false); $name = t(setting('general.site_name')) ?: 'WAFA'; @endphp
<a class="brand {{ ($light ?? false) ? 'brand--light' : '' }}" href="{{ lroute('home') }}" aria-label="{{ $name }} — {{ __('site.home') }}">
    @if ($logo)
        <img src="{{ $logo }}" alt="{{ $name }}" width="180" height="44" decoding="async">
    @else
        {{-- Provisional wordmark shown until the official WAFA logo is uploaded in Settings → Brand. --}}
        <span class="brand__word">{{ $name }}</span>
    @endif
</a>
