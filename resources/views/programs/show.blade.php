@extends('layouts.site')

@section('content')
@php
    $p = $program;
    $outcomes = lines($p->outcomes);
    $requirements = lines($p->requirements);
    $agenda = collect($p->agenda ?? [])->filter(fn ($a) => t($a['title'] ?? null) !== '');
    $statusClass = match ($p->registration_status) { 'open' => 'pill--ok', 'upcoming' => 'pill--warn', 'full', 'closed' => 'pill--neutral', default => '' };
@endphp
<div data-accent="amber">
<section class="phero phero--ivory prog-hero">
    <div class="container phero__grid has-media">
        <div class="phero__copy">
            @include('partials.crumbs', ['crumbs' => $seo->breadcrumbs])
            <p class="card__meta">
                @if ($p->category)<span class="pill">{{ t($p->category->name) }}</span>@endif
                <span class="pill {{ $statusClass }}">{{ __('programs.status.'.$p->registration_status) }}</span>
            </p>
            <h1 class="h1">{{ t($p->title) }}</h1>
            @if ($s = t($p->summary))<p class="lead">{{ $s }}</p>@endif
            <div class="btn-row">
                @if ($p->isRegistrable())
                    @if ($p->registration_url && preg_match('#^https://#', $p->registration_url))
                        <a class="btn" href="{{ $p->registration_url }}" target="_blank" rel="noopener" data-event="training_registration">{{ __('programs.register') }} {!! icon('external-link') !!}</a>
                    @else
                        <a class="btn" href="#register" data-event="consultation_click">{{ $p->registration_status === 'open' ? __('programs.register') : __('programs.enquire') }} {!! icon('arrow-right', 'icon flip-rtl') !!}</a>
                    @endif
                @endif
                <a class="btn btn--ghost" href="{{ lroute('programs.index') }}">{{ __('site.all_programs') }}</a>
            </div>
        </div>
        <div class="phero__media frame">@include('components.media', ['media' => $p->image, 'fallback' => art('program-'.(($p->id % 4) + 1)), 'eager' => true, 'sizes' => '(min-width:1024px) 40vw, 100vw'])</div>
    </div>
</section>

<section class="section prog">
    <div class="container prog__grid">
        <div class="prog__main">
            @if ($desc = t($p->description))
                <div class="prog__block"><h2 class="h3">{{ __('programs.overview') }}</h2><div class="prose">{!! \App\Support\Html::clean($desc) !!}</div></div>
            @endif
            @if ($outcomes)
                <div class="prog__block"><h2 class="h3">{{ __('programs.outcomes') }}</h2><ul class="checks prog__outcomes">@foreach ($outcomes as $o)<li>{{ $o }}</li>@endforeach</ul></div>
            @endif
            @if ($agenda->isNotEmpty())
                <div class="prog__block">
                    <h2 class="h3">{{ __('programs.agenda') }}</h2>
                    <ol class="prog__agenda">
                        @foreach ($agenda as $ai => $a)
                            <li><span class="prog__agenda-n">{{ $ai + 1 }}</span><div><h3 class="h4">{{ t($a['title'] ?? null) }}</h3>@if($tx = t($a['text'] ?? null))<p>{{ $tx }}</p>@endif</div></li>
                        @endforeach
                    </ol>
                </div>
            @endif
            @if ($requirements)
                <div class="prog__block"><h2 class="h3">{{ __('programs.requirements') }}</h2><ul class="prog__req">@foreach ($requirements as $r)<li>{{ $r }}</li>@endforeach</ul></div>
            @endif
            @if ($faqs->isNotEmpty())
                <div class="prog__block">
                    <h2 class="h3">{{ __('site.faq') }}</h2>
                    <div class="acc" data-acc>
                        @foreach ($faqs->values() as $fi => $f)
                            <div class="acc__item">
                                <h3 class="acc__h"><button type="button" class="acc__btn" aria-expanded="false" aria-controls="pf-{{ $fi }}" data-acc-btn><span>{{ $f['q'] }}</span><span class="acc__sign" aria-hidden="true"></span></button></h3>
                                <div class="acc__panel" id="pf-{{ $fi }}" hidden>{{ $f['a'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <aside class="prog__side">
            <div class="prog__facts">
                <h2 class="h4">{{ __('programs.at_a_glance') }}</h2>
                <dl>
                    @if ($p->delivery_mode)<div><dt>{!! icon('presentation') !!}{{ __('programs.format') }}</dt><dd>{{ __('programs.mode.'.$p->delivery_mode) }}</dd></div>@endif
                    @if ($d = t($p->duration))<div><dt>{!! icon('clock') !!}{{ __('programs.duration') }}</dt><dd>{{ $d }}</dd></div>@endif
                    @if ($p->starts_at)<div><dt>{!! icon('calendar') !!}{{ __('programs.dates') }}</dt><dd>{{ $p->starts_at->translatedFormat('j F Y') }}@if($p->ends_at && ! $p->ends_at->eq($p->starts_at)) – {{ $p->ends_at->translatedFormat('j F Y') }}@endif</dd></div>@endif
                    @if ($l = t($p->location))<div><dt>{!! icon('map-pin') !!}{{ __('programs.location') }}</dt><dd>{{ $l }}</dd></div>@endif
                    @if ($tr = t($p->trainer))<div><dt>{!! icon('user-round') !!}{{ __('programs.trainer') }}</dt><dd>{{ $tr }}</dd></div>@endif
                    @if ($au = t($p->audience))<div><dt>{!! icon('users') !!}{{ __('programs.audience') }}</dt><dd>{{ $au }}</dd></div>@endif
                    @if (! is_null($p->has_certificate))<div><dt>{!! icon('badge-check') !!}{{ __('programs.certificate') }}</dt><dd>{{ $p->has_certificate ? __('programs.certificate_yes') : __('programs.certificate_no') }}</dd></div>@endif
                    @if ($p->online_link && $p->delivery_mode === 'online' && $p->registration_status === 'open')<div><dt>{!! icon('monitor') !!}{{ __('programs.online') }}</dt><dd>{{ __('programs.online_shared') }}</dd></div>@endif
                </dl>
            </div>
            @if ($p->isRegistrable())
                <div class="prog__register" id="register">
                    <h2 class="h4">{{ $p->registration_status === 'open' ? __('programs.register') : __('programs.enquire') }}</h2>
                    <p class="muted small">{{ __('programs.register_text') }}</p>
                    @include('partials.enquiry-form', ['type' => 'training', 'program' => $p])
                </div>
            @endif
        </aside>
    </div>
</section>

@if ($related->isNotEmpty())
<section class="section bg-mist">
    <div class="container">
        <div class="shead"><h2 class="h2">{{ __('programs.related') }}</h2></div>
        <div class="rail rail--grid" data-rail style="--cols: 3">
            <ul class="rail__track" data-rail-track tabindex="0" aria-label="{{ __('programs.related') }}">
                @foreach ($related as $r)<li>@include('programs.card', ['program' => $r])</li>@endforeach
            </ul>
            @include('partials.rail-controls')
        </div>
    </div>
</section>
@endif
</div>
@endsection
