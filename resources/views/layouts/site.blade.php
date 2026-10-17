@php
    $locale = app()->getLocale();
    $dir = $locale === 'ar' ? 'rtl' : 'ltr';
    $seo ??= \App\Support\Seo::make(t(setting('general.site_name')) ?: 'WAFA');
    $nonce = app()->bound('csp.nonce') ? app('csp.nonce') : null;
    $quickbar = \App\Support\Contact::channels();
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $dir }}" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <script nonce="{{ $nonce }}">document.documentElement.classList.replace('no-js','js');</script>
    @include('partials.seo')
    @include('partials.tracking-head')
    <link rel="icon" href="{{ \App\Support\Brand::faviconUrl(32) }}" sizes="32x32">
    <link rel="icon" href="{{ \App\Support\Brand::faviconUrl(192) }}" sizes="192x192">
    <link rel="apple-touch-icon" href="{{ \App\Support\Brand::faviconUrl(180) }}">
    <meta name="theme-color" content="{{ setting('brand.color_primary') ?: '#16191c' }}">
    @php
        $preload = $locale === 'ar'
            ? ['node_modules/@fontsource/ibm-plex-sans-arabic/files/ibm-plex-sans-arabic-arabic-400-normal.woff2', 'node_modules/@fontsource/ibm-plex-sans-arabic/files/ibm-plex-sans-arabic-arabic-700-normal.woff2']
            : ['node_modules/@fontsource-variable/inter/files/inter-latin-wght-normal.woff2', 'node_modules/@fontsource-variable/fraunces/files/fraunces-latin-opsz-normal.woff2'];
    @endphp
    @foreach ($preload as $font)
        @php try { $fontUrl = \Illuminate\Support\Facades\Vite::asset($font); } catch (\Throwable) { $fontUrl = null; } @endphp
        @if ($fontUrl)<link rel="preload" href="{{ $fontUrl }}" as="font" type="font/woff2" crossorigin>@endif
    @endforeach
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if ($vars = \App\Support\Brand::cssVariables())
        <style>{!! $vars !!}</style>
    @endif
    @stack('head')
</head>
<body class="{{ trim(($bodyClass ?? '').' '.((setting('quickbar.enabled') ?? true) ? '' : 'no-quickbar')) }}" data-locale="{{ $locale }}" data-track="{{ route('track') }}">
    @include('partials.tracking-body')
    <a class="skip-link" href="#main">{{ __('site.skip_to_content') }}</a>
    @include('partials.header')
    <main id="main" tabindex="-1">
        @yield('content')
    </main>
    @include('partials.footer')
    @include('partials.quickbar', ['channels' => $quickbar])
    @include('partials.contact-widget', ['channels' => $quickbar])
    @include('partials.consent')
    @stack('scripts')
</body>
</html>
