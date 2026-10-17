<?php

namespace App\Support;

use App\Models\AnalyticsEvent;
use Illuminate\Http\Request;

/**
 * Privacy-friendly first-party analytics: no cookies, no raw IPs. Visitors are
 * counted with a salted hash that rotates daily, so they cannot be tracked
 * across days or identified.
 */
class Analytics
{
    public static function enabled(): bool
    {
        return (bool) setting('analytics.first_party', true);
    }

    public static function record(string $type, ?string $name, string $path, string $locale, Request $request, ?string $referrer = null): void
    {
        if (! static::enabled() || static::isBot((string) $request->userAgent())) {
            return;
        }
        $refHost = null;
        if ($referrer && ($host = parse_url($referrer, PHP_URL_HOST))) {
            $refHost = strtolower(preg_replace('/^www\./', '', $host));
            if ($refHost === strtolower(preg_replace('/^www\./', '', (string) $request->getHost()))) {
                $refHost = null;
            }
        }
        try {
            AnalyticsEvent::create([
                'type' => $type,
                'name' => $name,
                'path' => mb_substr($path, 0, 300),
                'locale' => $locale,
                'device' => static::device((string) $request->userAgent()),
                'referrer_host' => $refHost ? mb_substr($refHost, 0, 150) : null,
                'visitor_hash' => hash('sha256', now()->toDateString().'|'.$request->ip().'|'.$request->userAgent().'|'.config('app.key')),
                'created_at' => now(),
            ]);
        } catch (\Throwable) {
            // Analytics must never break the page.
        }
    }

    public static function device(string $ua): string
    {
        $ua = strtolower($ua);
        if (preg_match('/ipad|tablet|kindle|silk|(android(?!.*mobile))/', $ua)) {
            return 'tablet';
        }
        if (preg_match('/mobi|iphone|ipod|android|blackberry|opera mini|iemobile/', $ua)) {
            return 'mobile';
        }

        return 'desktop';
    }

    public static function isBot(string $ua): bool
    {
        return $ua === '' || (bool) preg_match('/bot|crawl|spider|slurp|preview|monitor|curl|wget|python|headless|lighthouse|pingdom|facebookexternalhit|scan/i', $ua);
    }
}
