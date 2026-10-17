@php $policy = \App\Models\Page::query()->where('key', 'cookies')->where('is_published', true)->first(); @endphp
<section class="consent" data-consent hidden aria-labelledby="consent-title" role="region">
    <h2 id="consent-title">{!! icon('cookie') !!} {{ t(setting('cookies.title')) ?: __('consent.title') }}</h2>
    <p>{{ t(setting('cookies.text')) ?: __('consent.text') }}
        @if ($policy) <a href="{{ $policy->url() }}">{{ __('consent.policy') }}</a>@endif</p>
    <form class="consent__prefs" data-consent-prefs hidden>
        <div class="toggle">
            <div><strong>{{ __('consent.necessary') }}</strong><span class="d">{{ __('consent.necessary_text') }}</span></div>
            <label class="switch"><input type="checkbox" checked disabled aria-label="{{ __('consent.necessary') }}"><i></i></label>
        </div>
        @if (setting('cookies.category_analytics') ?? true)
        <div class="toggle">
            <div><strong>{{ __('consent.analytics') }}</strong><span class="d">{{ __('consent.analytics_text') }}</span></div>
            <label class="switch"><input type="checkbox" name="analytics" aria-label="{{ __('consent.analytics') }}"><i></i></label>
        </div>
        @endif
        @if (setting('cookies.category_marketing') ?? true)
        <div class="toggle">
            <div><strong>{{ __('consent.marketing') }}</strong><span class="d">{{ __('consent.marketing_text') }}</span></div>
            <label class="switch"><input type="checkbox" name="marketing" aria-label="{{ __('consent.marketing') }}"><i></i></label>
        </div>
        @endif
    </form>
    <div class="consent__actions">
        <button type="button" class="btn btn--sm" data-consent-accept>{{ __('consent.accept_all') }}</button>
        <button type="button" class="btn btn--sm btn--ghost" data-consent-reject>{{ __('consent.reject') }}</button>
        <button type="button" class="btn btn--sm btn--ghost" data-consent-customize>{{ __('consent.customize') }}</button>
        <button type="button" class="btn btn--sm" data-consent-save hidden>{{ __('consent.save') }}</button>
    </div>
</section>
