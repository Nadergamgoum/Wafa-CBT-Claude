{{-- Shared hero copy: breadcrumb, category label, H1, lead, CTAs. --}}
@php
    $light = $light ?? false;
    $eyebrow = t($hero['eyebrow'] ?? null) ?: t($service->category?->title);
    $title = t($hero['title'] ?? null) ?: t($service->title);
    $lead = t($hero['lead'] ?? null) ?: t($service->summary);
@endphp
@include('partials.crumbs', ['crumbs' => $crumbs, 'light' => $light])
<p class="eyebrow {{ $light ? 'eyebrow--light' : '' }}">{{ $eyebrow }}</p>
<h1 class="h1 shero__title">{!! rich_title($title) !!}</h1>
@if ($lead)<p class="lead shero__lead">{{ $lead }}</p>@endif
@include('partials.cta', ['b' => [
    'cta_label' => $hero['cta_label'] ?? ['en' => __('site.request_consultation', [], 'en'), 'ar' => __('site.request_consultation', [], 'ar')],
    'cta_link' => $hero['cta_link'] ?? '/contact#contact-form',
    'cta2_label' => $hero['cta2_label'] ?? null,
    'cta2_link' => $hero['cta2_link'] ?? null,
], 'light' => $light])
