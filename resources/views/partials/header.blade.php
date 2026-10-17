@php
    use App\Support\Content;
    use App\Support\Locales;
    $items = \App\Models\Menu::items('header');
    $categories = Content::categories();
    $activeKey = isset($service) ? $service->category?->key : (isset($category) && $category instanceof \App\Models\ServiceCategory ? $category->key : null);
    $routeName = preg_replace('/^ar\./', '', (string) optional(request()->route())->getName());
    $resolve = function (array $item) use ($categories, &$resolve) {
        $type = $item['type'] ?? 'url';
        $target = $item['target'] ?? '';
        $entry = match ($type) {
            'category' => ($c = $categories->firstWhere('key', $target)) ? ['category' => $c, 'url' => $c->url(), 'label' => t($item['label'] ?? null) ?: $c->navLabel()] : null,
            'route' => \Illuminate\Support\Facades\Route::has($target) ? ['url' => lroute($target), 'label' => t($item['label'] ?? null), 'route' => $target] : null,
            default => $target !== '' ? ['url' => link_url($target), 'label' => t($item['label'] ?? null)] : null,
        };
        if ($entry && $type !== 'category') {
            // Optional dropdown children (managed in Admin → Menus).
            $entry['children'] = collect($item['children'] ?? [])->filter(fn ($ch) => ($ch['enabled'] ?? true))->map($resolve)->filter()->values();
        }
        return $entry;
    };
    $nav = collect($items)->filter(fn ($i) => ($i['enabled'] ?? true))->map($resolve)->filter()->values();
    $mobileExtra = collect(\App\Models\Menu::items('mobile'))->filter(fn ($i) => ($i['enabled'] ?? true))->map($resolve)->filter()->values();
    $showSwitch = (bool) (setting('general.language_switcher') ?? true);
    $other = Locales::other();
    $switch = $alternates[$other] ?? ($seo->alternates[$other] ?? Locales::switchUrl($other));
@endphp
<header class="site-header" data-header>
    <div class="container site-header__bar">
        @include('partials.brand')

        <nav class="nav" aria-label="{{ __('site.main_navigation') }}">
            @foreach ($nav as $i => $entry)
                @if (isset($entry['category']))
                    @php $cat = $entry['category']; $isActive = $activeKey === $cat->key; @endphp
                    <div class="nav__item" data-mega>
                        <button type="button" class="nav__link {{ $isActive ? 'is-active' : '' }}" aria-expanded="false" aria-controls="mega-{{ $cat->key }}">
                            {{ $entry['label'] }} {!! icon('chevron-down') !!}
                        </button>
                        <div class="mega" id="mega-{{ $cat->key }}" data-mega-panel>
                            @include('partials.mega', ['cat' => $cat])
                        </div>
                    </div>
                @elseif (($entry['children'] ?? collect())->isNotEmpty())
                    @php $isActive = isset($entry['route']) && str_starts_with($routeName, explode('.', $entry['route'])[0]); @endphp
                    <div class="nav__item nav__item--dd" data-mega>
                        <button type="button" class="nav__link {{ $isActive ? 'is-active' : '' }}" aria-expanded="false" aria-controls="dd-{{ $i }}">
                            {{ $entry['label'] }} {!! icon('chevron-down') !!}
                        </button>
                        <div class="nav__dd" id="dd-{{ $i }}" data-mega-panel>
                            <a href="{{ $entry['url'] }}" class="nav__dd-main">{{ $entry['label'] }} {!! icon('arrow-right', 'icon flip-rtl') !!}</a>
                            @foreach ($entry['children'] as $child)
                                <a href="{{ $child['url'] }}">{{ $child['label'] }}</a>
                            @endforeach
                        </div>
                    </div>
                @else
                    @php $isActive = isset($entry['route']) && str_starts_with($routeName, explode('.', $entry['route'])[0]); @endphp
                    <a class="nav__link {{ $isActive ? 'is-active' : '' }}" href="{{ $entry['url'] }}" @if($isActive) aria-current="page" @endif>{{ $entry['label'] }}</a>
                @endif
            @endforeach
        </nav>

        <div class="header-actions">
            @if ($showSwitch)
            <a class="lang-switch" href="{{ $switch }}" hreflang="{{ $other }}" lang="{{ $other }}" data-lang-switch>
                {!! icon('globe') !!}<span>{{ Locales::meta()[$other]['native'] }}</span>
            </a>
            @endif
            <a class="btn btn--sm header-cta" href="{{ link_url(setting('general.header_cta_link') ?: '/contact#contact-form') }}" data-event="consultation_click">{{ t(setting('general.header_cta')) ?: __('site.talk_to_experts') }}</a>
            <button type="button" class="menu-toggle" aria-expanded="false" aria-controls="drawer" data-drawer-open>
                {!! icon('menu') !!}<span class="sr-only">{{ __('site.open_menu') }}</span>
            </button>
        </div>
    </div>
</header>

<div class="drawer" id="drawer" data-drawer aria-hidden="true">
    <div class="drawer__scrim" data-drawer-close></div>
    <div class="drawer__panel" role="dialog" aria-modal="true" aria-label="{{ __('site.menu') }}">
        <div class="drawer__head">
            @include('partials.brand')
            <button type="button" class="menu-toggle" data-drawer-close>{!! icon('x') !!}<span class="sr-only">{{ __('site.close_menu') }}</span></button>
        </div>
        <nav class="drawer__body" aria-label="{{ __('site.mobile_navigation') }}">
            @foreach ($nav as $i => $entry)
                @if (isset($entry['category']))
                    @php $cat = $entry['category']; $isActive = $activeKey === $cat->key; @endphp
                    <div class="mnav__group">
                        <button type="button" class="mnav__toggle {{ $isActive ? 'is-active' : '' }}" aria-expanded="{{ $isActive ? 'true' : 'false' }}" aria-controls="mnav-{{ $cat->key }}" data-mnav>
                            {{ $entry['label'] }} {!! icon('chevron-down') !!}
                        </button>
                        <div class="mnav__sub" id="mnav-{{ $cat->key }}" @unless($isActive) hidden @endunless>
                            @foreach ($cat->publishedServices as $s)
                                <a href="{{ $s->url() }}" class="{{ $s->family === 'medical' ? 'is-flagship' : '' }}" @if(isset($service) && $service->id === $s->id) aria-current="page" @endif>
                                    <span class="ico">{!! icon($s->icon ?: 'shield-check') !!}</span>{{ $s->navLabel() }}
                                </a>
                            @endforeach
                            <a href="{{ $cat->url() }}" class="all">{{ __('site.view_all') }} — {{ t($cat->title) }} {!! icon('arrow-right', 'icon flip-rtl') !!}</a>
                        </div>
                    </div>
                @elseif (($entry['children'] ?? collect())->isNotEmpty())
                    <div class="mnav__group">
                        <button type="button" class="mnav__toggle" aria-expanded="false" aria-controls="mnav-dd-{{ $i }}" data-mnav>
                            {{ $entry['label'] }} {!! icon('chevron-down') !!}
                        </button>
                        <div class="mnav__sub" id="mnav-dd-{{ $i }}" hidden>
                            @foreach ($entry['children'] as $child)
                                <a href="{{ $child['url'] }}">{{ $child['label'] }}</a>
                            @endforeach
                            <a href="{{ $entry['url'] }}" class="all">{{ $entry['label'] }} {!! icon('arrow-right', 'icon flip-rtl') !!}</a>
                        </div>
                    </div>
                @else
                    <div class="mnav__group"><a class="mnav__link" href="{{ $entry['url'] }}">{{ $entry['label'] }} {!! icon('chevron-right', 'icon flip-rtl') !!}</a></div>
                @endif
            @endforeach
            @foreach ($mobileExtra as $entry)
                @continue(isset($entry['category']))
                <div class="mnav__group"><a class="mnav__link" href="{{ $entry['url'] }}">{{ $entry['label'] }} {!! icon('chevron-right', 'icon flip-rtl') !!}</a></div>
            @endforeach
        </nav>
        <div class="drawer__foot">
            <a class="btn btn--block" href="{{ link_url(setting('general.header_cta_link') ?: '/contact#contact-form') }}" data-event="consultation_click">{{ t(setting('general.header_cta')) ?: __('site.talk_to_experts') }}</a>
            @php $quick = collect(\App\Support\Contact::channels())->whereIn('key', ['phone', 'whatsapp']); @endphp
            @if ($quick->isNotEmpty())
                <div class="drawer__contact">
                    @foreach ($quick as $ch)
                        <a class="btn btn--sm {{ $ch['key'] === 'whatsapp' ? 'btn--whatsapp' : 'btn--ghost' }}" href="{{ $ch['href'] }}" data-event="{{ $ch['event'] }}" @if($ch['external']) target="_blank" rel="noopener" @endif>{!! icon($ch['icon']) !!} {{ $ch['key'] === 'phone' ? __('site.call') : __('site.whatsapp') }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
