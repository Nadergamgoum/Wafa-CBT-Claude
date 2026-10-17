@php
    // Standalone error layout: no database access, so it renders even when the app is degraded.
    $ar = request()->is('ar', 'ar/*');
    app()->setLocale($ar ? 'ar' : 'en');
    $home = url($ar ? '/ar' : '/');
@endphp
<!DOCTYPE html>
<html lang="{{ $ar ? 'ar' : 'en' }}" dir="{{ $ar ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>@yield('code') — {{ config('app.name', 'WAFA') }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="no-quickbar">
    <main class="errpage">
        <div class="errpage__card">
            <a class="brand" href="{{ $home }}"><span class="brand__word">{{ config('app.name', 'WAFA') }}</span></a>
            <p class="errpage__code">@yield('code')</p>
            <h1 class="h2">@yield('title')</h1>
            <p class="lead">@yield('message')</p>
            <div class="btn-row">
                <a class="btn" href="{{ $home }}">{{ __('errors.home') }}</a>
                <a class="btn btn--ghost" href="{{ url($ar ? '/ar/contact' : '/contact') }}">{{ __('errors.contact') }}</a>
            </div>
        </div>
    </main>
</body>
</html>
