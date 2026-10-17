@php
    $locale = app()->getLocale();
    $full = $seo->fullTitle();
    $desc = \Illuminate\Support\Str::limit(strip_tags($seo->description ?: t(setting('seo.default_description'))), 300, '…');
    $ogImage = $seo->ogImage ?: (\App\Support\Brand::media('og_image')?->url(1200));
    $siteName = t(setting('general.site_name')) ?: 'WAFA';
@endphp
<title>{{ $full }}</title>
@if ($desc)<meta name="description" content="{{ $desc }}">@endif
<meta name="robots" content="{{ $seo->robots() }}">
@if ($seo->canonical)<link rel="canonical" href="{{ $seo->canonical }}">@endif
@foreach ($seo->alternates as $l => $href)
<link rel="alternate" hreflang="{{ $l }}" href="{{ $href }}">
@endforeach
@if (isset($seo->alternates['en']))<link rel="alternate" hreflang="x-default" href="{{ $seo->alternates['en'] }}">@endif
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:type" content="{{ $seo->ogType }}">
<meta property="og:title" content="{{ $seo->ogTitle ?: $full }}">
@if ($seo->ogDescription ?: $desc)<meta property="og:description" content="{{ $seo->ogDescription ?: $desc }}">@endif
<meta property="og:url" content="{{ $seo->canonical ?? url()->current() }}">
<meta property="og:locale" content="{{ \App\Support\Locales::meta()[$locale]['og'] }}">
<meta property="og:locale:alternate" content="{{ \App\Support\Locales::meta()[\App\Support\Locales::other()]['og'] }}">
@if ($ogImage)<meta property="og:image" content="{{ $ogImage }}">@endif
<meta name="twitter:card" content="{{ $seo->twitterCard }}">
@if ($handle = setting('seo.twitter_handle'))<meta name="twitter:site" content="{{ '@'.ltrim($handle, '@') }}">@endif
<meta name="twitter:title" content="{{ $seo->ogTitle ?: $full }}">
@if ($seo->ogDescription ?: $desc)<meta name="twitter:description" content="{{ $seo->ogDescription ?: $desc }}">@endif
@if ($ogImage)<meta name="twitter:image" content="{{ $ogImage }}">@endif
@if ($v = setting('analytics.google_verification'))<meta name="google-site-verification" content="{{ $v }}">@endif
@if ($v = setting('analytics.bing_verification'))<meta name="msvalidate.01" content="{{ $v }}">@endif
@if ($seo->schema)
<script type="application/ld+json">{!! \App\Support\Schema::graph($seo->schema) !!}</script>
@endif
