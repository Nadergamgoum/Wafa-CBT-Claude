{{-- Sticky mobile contact bar. Items, order and labels are managed in Settings → Contact & WhatsApp → Mobile contact bar. --}}
@php
    $byKey = collect($channels)->keyBy('key');
    $config = setting('quickbar.items') ?: [['key' => 'phone', 'enabled' => true], ['key' => 'whatsapp', 'enabled' => true], ['key' => 'consult', 'enabled' => (bool) setting('channels.quickbar_consult', false)], ['key' => 'email', 'enabled' => false]];
    $label = fn (string $k, string $fallback) => t(setting('quickbar.label_'.$k)) ?: $fallback;
    $buttons = [];
    foreach ($config as $row) {
        $k = $row['key'] ?? null;
        if (! ($row['enabled'] ?? false)) {
            continue;
        }
        $b = match ($k) {
            'phone' => ($c = $byKey->get('phone')) ? ['class' => 'q-call', 'href' => $c['href'], 'icon' => 'phone', 'event' => 'phone_click', 'label' => $label('phone', __('site.call')), 'ext' => false] : null,
            'whatsapp' => ($c = $byKey->get('whatsapp')) ? ['class' => 'q-wa', 'href' => $c['href'], 'icon' => 'b-whatsapp', 'event' => 'whatsapp_click', 'label' => $label('whatsapp', __('site.whatsapp')), 'ext' => true] : null,
            'email' => ($c = $byKey->get('email')) ? ['class' => 'q-call', 'href' => $c['href'], 'icon' => 'mail', 'event' => 'email_click', 'label' => $label('email', __('site.email_us')), 'ext' => false] : null,
            'consult' => ['class' => 'q-consult', 'href' => link_url(setting('quickbar.consult_link') ?: '/contact#contact-form'), 'icon' => 'message-square-text', 'event' => 'consultation_click', 'label' => $label('consult', __('site.consult_short')), 'ext' => false],
            default => null,
        };
        if ($b) {
            $buttons[] = $b;
        }
    }
    // Always offer at least one way to get in touch.
    if (! $buttons) {
        $buttons[] = ['class' => 'q-consult', 'href' => lroute('contact').'#contact-form', 'icon' => 'message-square-text', 'event' => 'consultation_click', 'label' => __('site.request_consultation'), 'ext' => false];
    }
@endphp
@if (setting('quickbar.enabled') ?? true)
<nav class="quickbar" aria-label="{{ __('site.quick_contact') }}" data-quickbar>
    @foreach (array_slice($buttons, 0, 3) as $b)
        <a class="{{ $b['class'] }}" href="{{ $b['href'] }}" data-event="{{ $b['event'] }}" @if($b['ext']) target="_blank" rel="noopener" @endif>{!! icon($b['icon']) !!}{{ $b['label'] }}</a>
    @endforeach
</nav>
@endif
