@php
    $services = $cat->publishedServices;
    $flagship = $services->firstWhere('family', 'medical');
    $rest = $flagship ? $services->where('id', '!=', $flagship->id) : $services;
@endphp
<div class="container mega__inner">
    @if ($flagship)
        <a class="mega__feature" href="{{ $flagship->url() }}">
            <span class="frame">@include('components.media', ['media' => $flagship->cardImage, 'fallback' => $flagship->artUrl('card'), 'alt' => '', 'sizes' => '150px', 'widths' => 480])</span>
            <span>
                <span class="mega__tag">{{ __('site.flagship_service') }}</span>
                <strong>{{ t($flagship->title) }}</strong>
                <p>{{ t($flagship->summary) }}</p>
                <span class="link-arrow">{{ __('site.explore') }} {!! icon('arrow-right', 'icon flip-rtl') !!}</span>
            </span>
        </a>
    @else
        <div class="mega__intro">
            <p class="mega__heading">{{ t($cat->title) }}</p>
            <p class="mega__statement">{{ t($cat->hero['title'] ?? null) ? plain_title(t($cat->hero['title'])) : t($cat->title) }}</p>
            <p>{{ t($cat->summary) }}</p>
        </div>
    @endif
    <div class="mega__list">
        <p class="mega__heading">{{ $flagship ? __('site.more_insurance') : __('site.services') }}</p>
        @foreach ($rest as $s)
            <a class="mega__link" href="{{ $s->url() }}">
                <span class="ico">{!! icon($s->icon ?: 'shield-check') !!}</span>
                <span><strong>{{ $s->navLabel() }}</strong><span class="d">{{ \Illuminate\Support\Str::limit(t($s->summary), 90) }}</span></span>
            </a>
        @endforeach
    </div>
    <div class="mega__aside">
        <p class="mega__heading">{{ t($cat->title) }}</p>
        <p>{{ \Illuminate\Support\Str::limit(t($cat->summary), 160) }}</p>
        <a class="link-arrow" href="{{ $cat->url() }}">{{ __('site.view_all') }} {!! icon('arrow-right', 'icon flip-rtl') !!}</a>
        @if ($cat->key === 'learning')
            <a class="link-arrow" href="{{ lroute('programs.index') }}">{{ __('site.training_programs') }} {!! icon('arrow-right', 'icon flip-rtl') !!}</a>
            @if (\App\Support\Content::engagements(1)->isNotEmpty())
                <a class="link-arrow" href="{{ lroute('engagements.index') }}">{{ __('site.engagements') }} {!! icon('arrow-right', 'icon flip-rtl') !!}</a>
            @endif
        @endif
        <a class="btn btn--sm btn--ghost" href="{{ lroute('contact') }}#contact-form" data-event="consultation_click">{{ __('site.request_consultation') }}</a>
    </div>
</div>
