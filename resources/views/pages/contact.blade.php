@extends('layouts.site')

@section('content')
@php
    use App\Support\Contact;
    $channels = Contact::channels();
    $address = t(setting('contact.address'));
    $hours = t(setting('contact.hours'));
    $map = setting('contact.map_embed_url');
    $social = Contact::social();
@endphp
@include('partials.page-hero', ['title' => t($page->title), 'intro' => t($page->intro), 'crumbs' => $seo->breadcrumbs, 'eyebrow' => __('site.contact')])

<section class="section contact" aria-label="{{ __('site.contact_options') }}">
    <div class="container contact__grid">
        <div class="contact__form-wrap">
            <div class="contact__form-card" id="contact-form">
                <h2 class="h3">{{ __('form.title') }}</h2>
                <p class="muted">{{ __('form.intro') }}</p>
                @include('partials.enquiry-form', ['type' => 'contact'])
            </div>
        </div>
        <aside class="contact__aside">
            @php $direct = collect($channels)->whereIn('key', ['whatsapp', 'phone', 'email']); @endphp
            @if ($direct->isNotEmpty())
                <div class="contact__block">
                    <h2 class="h4">{{ __('site.talk_directly') }}</h2>
                    <ul class="contact__channels">
                        @foreach ($direct as $ch)
                            <li><a href="{{ $ch['href'] }}" data-event="{{ $ch['event'] }}" @if($ch['external']) target="_blank" rel="noopener" @endif>
                                <span class="ico {{ $ch['key'] === 'whatsapp' ? 'ico--wa' : '' }}">{!! icon($ch['icon']) !!}</span>
                                <span><strong>{{ $ch['label'] }}</strong>@if($ch['detail'])<small @if($ch['key'] !== 'whatsapp') dir="ltr" @endif>{{ $ch['detail'] }}</small>@endif</span>
                            </a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($address || $hours)
                <div class="contact__block">
                    @if ($address)<h2 class="h4">{{ __('site.visit_us') }}</h2><p class="contact__addr">{!! icon('map-pin') !!}<span>{!! nl2br(e($address)) !!}</span></p>@endif
                    @if ($hours)<h2 class="h4">{{ __('site.business_hours') }}</h2><p class="contact__addr">{!! icon('clock') !!}<span>{!! nl2br(e($hours)) !!}</span></p>@endif
                </div>
            @endif
            @if ($social)
                <div class="contact__block">
                    <h2 class="h4">{{ __('site.follow_us') }}</h2>
                    <ul class="social social--dark">@foreach ($social as $s)<li><a href="{{ $s['url'] }}" target="_blank" rel="noopener" aria-label="{{ $s['label'] }}">{!! icon('b-'.$s['platform']) !!}</a></li>@endforeach</ul>
                </div>
            @endif
            @if (! $direct->count() && ! $address && ! $social)
                <div class="contact__block contact__block--note">
                    <h2 class="h4">{{ __('site.response_title') }}</h2>
                    <p class="muted">{{ __('site.response_text') }}</p>
                </div>
            @endif
        </aside>
    </div>
    @if ($map && preg_match('#^https://(www\.)?google\.[a-z.]+/maps/embed#', $map))
        <div class="container contact__map"><iframe src="{{ $map }}" title="{{ __('site.map') }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe></div>
    @endif
</section>

@include('partials.blocks', ['blocks' => $page->sections ?? [], 'ctx' => $page, 'faqTopic' => 'contact'])
@endsection
