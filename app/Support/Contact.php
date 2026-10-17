<?php

namespace App\Support;

/**
 * Contact channels configured in Settings → Contact & channels.
 * Every channel is optional: unset values are simply not rendered.
 */
class Contact
{
    public static function phone(): ?string
    {
        $p = trim((string) setting('contact.phone'));

        return $p !== '' ? $p : null;
    }

    public static function phoneHref(): ?string
    {
        $p = static::phone();

        return $p ? 'tel:'.preg_replace('/[^\d+]/', '', $p) : null;
    }

    public static function email(): ?string
    {
        $e = trim((string) setting('contact.email'));

        return filter_var($e, FILTER_VALIDATE_EMAIL) ? $e : null;
    }

    public static function whatsappNumber(): ?string
    {
        if (! setting('whatsapp.enabled', false)) {
            return null;
        }
        $cc = preg_replace('/\D/', '', (string) setting('whatsapp.country_code'));
        $num = preg_replace('/\D/', '', (string) setting('whatsapp.number'));
        if ($num === '') {
            return null;
        }
        $num = ltrim($num, '0');
        if ($cc !== '' && ! str_starts_with($num, $cc)) {
            $num = $cc.$num;
        }

        return strlen($num) >= 8 ? $num : null;
    }

    public static function whatsappUrl(?string $message = null): ?string
    {
        $num = static::whatsappNumber();
        if (! $num) {
            return null;
        }
        $message ??= t(setting('whatsapp.message'));

        return 'https://wa.me/'.$num.($message ? '?text='.rawurlencode($message) : '');
    }

    /**
     * Ordered list of enabled channels for the contact widget / quick bar.
     *
     * @return array<int, array{key:string,label:string,href:string,icon:string,detail:?string,event:?string,external:bool}>
     */
    public static function channels(): array
    {
        $available = [
            'whatsapp' => fn () => ($u = static::whatsappUrl()) ? ['label' => __('site.whatsapp'), 'href' => $u, 'icon' => 'b-whatsapp', 'detail' => __('site.whatsapp_hint'), 'event' => 'whatsapp_click', 'external' => true] : null,
            'phone' => fn () => ($h = static::phoneHref()) ? ['label' => __('site.call_us'), 'href' => $h, 'icon' => 'phone', 'detail' => static::phone(), 'event' => 'phone_click', 'external' => false] : null,
            'email' => fn () => ($e = static::email()) ? ['label' => __('site.email_us'), 'href' => 'mailto:'.$e, 'icon' => 'mail', 'detail' => $e, 'event' => 'email_click', 'external' => false] : null,
            'form' => fn () => ['label' => __('site.request_consultation'), 'href' => lroute('contact').'#contact-form', 'icon' => 'message-square-text', 'detail' => __('site.form_hint'), 'event' => 'consultation_click', 'external' => false],
            'messenger' => fn () => ($u = trim((string) setting('contact.messenger_url'))) ? ['label' => 'Messenger', 'href' => $u, 'icon' => 'b-messenger', 'detail' => null, 'event' => null, 'external' => true] : null,
            'telegram' => fn () => ($u = trim((string) setting('contact.telegram_url'))) ? ['label' => 'Telegram', 'href' => $u, 'icon' => 'b-telegram', 'detail' => null, 'event' => null, 'external' => true] : null,
        ];
        $config = setting('channels.items') ?: array_map(fn ($k) => ['key' => $k, 'enabled' => true], array_keys($available));

        $out = [];
        foreach ($config as $row) {
            $key = $row['key'] ?? null;
            if (! $key || empty($row['enabled']) || ! isset($available[$key])) {
                continue;
            }
            if ($channel = $available[$key]()) {
                $out[] = ['key' => $key] + $channel;
            }
        }

        return $out;
    }

    public const SOCIAL_PLATFORMS = [
        'linkedin' => 'LinkedIn', 'facebook' => 'Facebook', 'instagram' => 'Instagram', 'x' => 'X / Twitter',
        'youtube' => 'YouTube', 'tiktok' => 'TikTok', 'telegram' => 'Telegram', 'snapchat' => 'Snapchat',
        'threads' => 'Threads', 'whatsapp' => 'WhatsApp',
    ];

    /** @return array<int, array{platform:string,label:string,url:string}> */
    public static function social(): array
    {
        return collect(setting('social.items') ?: [])
            ->filter(fn ($r) => ! empty($r['enabled']) && ! empty($r['url']) && isset(static::SOCIAL_PLATFORMS[$r['platform'] ?? '']))
            ->filter(fn ($r) => preg_match('#^https://#i', $r['url']))
            ->map(fn ($r) => ['platform' => $r['platform'], 'label' => static::SOCIAL_PLATFORMS[$r['platform']], 'url' => $r['url']])
            ->values()->all();
    }
}
