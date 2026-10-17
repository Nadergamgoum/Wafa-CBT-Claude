@extends('layouts.site')

@section('content')
@include('partials.page-hero', [
    'title' => $title,
    'intro' => $page ? t($page->intro) : null,
    'crumbs' => $seo->breadcrumbs,
    'eyebrow' => __('site.learning_leadership'),
    'image' => $page?->heroImage ?? $engagements->first()?->image,
    'art' => 'training',
])
<section class="section engidx" data-accent="teal">
    <div class="container">
        @if ($engagements->isEmpty())
            <div class="empty">
                {!! icon('users', 'icon icon--lg') !!}
                <h2 class="h3">{{ __('site.no_engagements') }}</h2>
                <a class="btn" href="{{ lroute('contact') }}#contact-form" data-event="consultation_click">{{ __('site.talk_to_experts') }}</a>
            </div>
        @else
            <ul class="progidx__grid">
                @foreach ($engagements as $e)<li>@include('engagements.card', ['engagement' => $e])</li>@endforeach
            </ul>
        @endif
    </div>
</section>
@if ($page)
    @include('partials.blocks', ['blocks' => $page->sections ?? [], 'ctx' => $page, 'faqTopic' => 'learning'])
@endif
@endsection
