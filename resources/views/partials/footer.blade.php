@php
    use App\Support\Contact;
    $categories = \App\Support\Content::categories();
    $company = \App\Models\Menu::items('footer_company');
    $legal = \App\Models\Menu::items('footer_legal');
    $social = Contact::social();
    $address = t(setting('contact.address'));
    $hours = t(setting('contact.hours'));
    $linkFor = fn ($i) => ($i['type'] ?? 'url') === 'route' && \Illuminate\Support\Facades\Route::has($i['target'] ?? '') ? lroute($i['target']) : link_url($i['target'] ?? '');
@endphp
<footer class="site-footer on-dark">
    <div class="container">
        <div class="footer__grid">
            <div class="footer__brand">
                @include('partials.brand', ['light' => true])
                <p>{{ t(setting('footer.tagline')) }}</p>
                @if ($social)
                    <ul class="social" aria-label="{{ __('site.follow_us') }}">
                        @foreach ($social as $s)
                            <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener me" aria-label="{{ $s['label'] }}">{!! icon('b-'.$s['platform']) !!}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="footer__cols-mobile">
                @foreach ($categories as $cat)
                    <div>
                        <p class="footer__title">{{ $cat->navLabel() }}</p>
                        <ul class="footer__links">
                            @foreach ($cat->publishedServices as $s)
                                <li><a href="{{ $s->url() }}">{{ $s->navLabel() }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
                @if ($company)
                    <div>
                        <p class="footer__title">{{ __('site.company') }}</p>
                        <ul class="footer__links">
                            @foreach ($company as $i)
                                @continue(! ($i['enabled'] ?? true))
                                <li><a href="{{ $linkFor($i) }}">{{ t($i['label'] ?? null) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            @if (Contact::phone() || Contact::email() || $address || $hours)
                <div>
                    <p class="footer__title">{{ __('site.contact') }}</p>
                    <div class="footer__contact">
                        @if ($p = Contact::phone())<a href="{{ Contact::phoneHref() }}" data-event="phone_click" dir="ltr">{!! icon('phone') !!}<span>{{ $p }}</span></a>@endif
                        @if ($e = Contact::email())<a href="mailto:{{ $e }}" data-event="email_click">{!! icon('mail') !!}<span>{{ $e }}</span></a>@endif
                        @if ($address)<span>{!! icon('map-pin') !!}<span>{!! nl2br(e($address)) !!}</span></span>@endif
                        @if ($hours)<span>{!! icon('clock') !!}<span>{!! nl2br(e($hours)) !!}</span></span>@endif
                    </div>
                </div>
            @endif
        </div>
        <div class="footer__bottom">
            <p>© {{ date('Y') }} {{ t(setting('general.legal_name')) ?: (t(setting('general.site_name')) ?: 'WAFA') }}. {{ t(setting('footer.copyright')) ?: __('site.rights') }}</p>
            @if ($legal)
                <ul>
                    @foreach ($legal as $i)
                        @continue(! ($i['enabled'] ?? true))
                        <li><a href="{{ $linkFor($i) }}">{{ t($i['label'] ?? null) }}</a></li>
                    @endforeach
                    <li><button type="button" class="footer__cookie" data-consent-open>{{ __('consent.manage') }}</button></li>
                </ul>
            @endif
        </div>
    </div>
</footer>
