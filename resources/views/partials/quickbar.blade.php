@php
    $call = collect($channels)->firstWhere('key', 'phone');
    $wa = collect($channels)->firstWhere('key', 'whatsapp');
@endphp
<nav class="quickbar" aria-label="{{ __('site.quick_contact') }}" data-quickbar>
    @if ($call)
        <a class="q-call" href="{{ $call['href'] }}" data-event="phone_click">{!! icon('phone') !!}{{ __('site.call') }}</a>
    @endif
    @if ($wa)
        <a class="q-wa" href="{{ $wa['href'] }}" target="_blank" rel="noopener" data-event="whatsapp_click">{!! icon('b-whatsapp') !!}{{ __('site.whatsapp') }}</a>
    @endif
    @if (! $call || ! $wa || setting('channels.quickbar_consult', false))
        <a class="q-consult" href="{{ lroute('contact') }}#contact-form" data-event="consultation_click">{!! icon('message-square-text') !!}{{ ($call || $wa) ? __('site.consult_short') : __('site.request_consultation') }}</a>
    @endif
</nav>
