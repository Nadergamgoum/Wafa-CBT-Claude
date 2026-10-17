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
    <link rel="icon" href="{{ \App\Support\Brand::media('favicon')?->url() ?? asset('favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ \App\Support\Brand::media('favicon')?->url() ?? asset('favicon.svg') }}">
    <meta name="theme-color" content="{{ setting('brand.color_primary') ?: '#0d3150' }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if ($vars = \App\Support\Brand::cssVariables())
        <style>{!! $vars !!}</style>
    @endif
    @stack('head')
</head>
<body class="{{ $bodyClass ?? '' }}" data-locale="{{ $locale }}" data-track="{{ route('track') }}">
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
