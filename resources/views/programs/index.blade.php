@extends('layouts.site')

@section('content')
@include('partials.page-hero', [
    'title' => $page ? t($page->title) : __('site.training_programs'),
    'intro' => $page ? t($page->intro) : null,
    'crumbs' => $seo->breadcrumbs,
    'eyebrow' => __('site.learning_leadership'),
    'image' => $page?->heroImage,
    'art' => 'training-card',
])
<section class="section progidx" data-accent="amber">
    <div class="container">
        <form class="filters" method="get" action="{{ lroute('programs.index') }}" aria-label="{{ __('programs.filter') }}">
            <div class="filters__chips" role="group" aria-label="{{ __('programs.category') }}">
                <a class="tab" href="{{ lroute('programs.index', array_filter(['format' => $mode])) }}" @if(! $active) aria-current="true" @endif aria-selected="{{ $active ? 'false' : 'true' }}">{{ __('programs.all') }}</a>
                @foreach ($categories as $c)
                    <a class="tab" href="{{ lroute('programs.index', array_filter(['category' => $c->slug, 'format' => $mode])) }}" aria-selected="{{ $active?->id === $c->id ? 'true' : 'false' }}" @if($active?->id === $c->id) aria-current="true" @endif>{{ t($c->name) }}</a>
                @endforeach
            </div>
            <div class="filters__select field">
                <label for="format" class="sr-only">{{ __('programs.format') }}</label>
                @if ($active)<input type="hidden" name="category" value="{{ $active->slug }}">@endif
                <select class="select" id="format" name="format" data-autosubmit>
                    <option value="">{{ __('programs.any_format') }}</option>
                    @foreach (\App\Models\TrainingProgram::DELIVERY_MODES as $k => $v)
                        <option value="{{ $k }}" @selected($mode === $k)>{{ __('programs.mode.'.$k) }}</option>
                    @endforeach
                </select>
                <noscript><button class="btn btn--sm" type="submit">{{ __('programs.apply') }}</button></noscript>
            </div>
        </form>

        @if ($programs->isEmpty())
            <div class="empty">
                {!! icon('graduation-cap', 'icon icon--lg') !!}
                <h2 class="h3">{{ __('programs.empty_title') }}</h2>
                <p class="muted">{{ __('programs.empty_text') }}</p>
                <a class="btn" href="{{ lroute('contact') }}#contact-form" data-event="consultation_click">{{ __('programs.ask_custom') }}</a>
            </div>
        @else
            <ul class="progidx__grid">
                @foreach ($programs as $p)<li>@include('programs.card', ['program' => $p])</li>@endforeach
            </ul>
        @endif
    </div>
</section>
@if ($page)
    @include('partials.blocks', ['blocks' => $page->sections ?? [], 'ctx' => $page, 'faqTopic' => 'learning'])
@endif
@endsection
