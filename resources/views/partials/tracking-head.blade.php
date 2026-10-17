@php
    // Each integration loads only when its ID is valid, its switch is on and its cookie category is enabled.
    $on = fn (string $k) => (bool) (setting('analytics.'.$k.'_enabled') ?? true);
    $analyticsCat = (bool) (setting('cookies.category_analytics') ?? true);
    $marketingCat = (bool) (setting('cookies.category_marketing') ?? true);
    $cfg = array_filter([
        'ga4' => $analyticsCat && $on('ga4') && preg_match('/^G-[A-Z0-9]{4,}$/', (string) setting('analytics.ga4_id')) ? setting('analytics.ga4_id') : null,
        'gtm' => $analyticsCat && $on('gtm') && preg_match('/^GTM-[A-Z0-9]{4,}$/', (string) setting('analytics.gtm_id')) ? setting('analytics.gtm_id') : null,
        'meta' => $marketingCat && $on('meta') && preg_match('/^\d{6,20}$/', (string) setting('analytics.meta_pixel_id')) ? setting('analytics.meta_pixel_id') : null,
        'linkedin' => $marketingCat && $on('linkedin') && preg_match('/^\d{3,12}$/', (string) setting('analytics.linkedin_partner_id')) ? setting('analytics.linkedin_partner_id') : null,
        'tiktok' => $marketingCat && $on('tiktok') && preg_match('/^[A-Z0-9]{8,30}$/', (string) setting('analytics.tiktok_pixel_id')) ? setting('analytics.tiktok_pixel_id') : null,
    ]);
    $cfg['requireConsent'] = (bool) setting('cookies.require_consent', true);
    $cfg['firstParty'] = \App\Support\Analytics::enabled();
    $cfg['consentVersion'] = (string) (setting('cookies.version') ?: '1');
@endphp
<script type="application/json" id="wafa-config">{!! json_encode($cfg, JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_SLASHES) !!}</script>
