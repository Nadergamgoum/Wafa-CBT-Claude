@extends('layouts.site')

@section('content')
    @include('partials.page-hero', ['title' => t($page->title), 'intro' => t($page->intro), 'crumbs' => $seo->breadcrumbs, 'tone' => 'mist'])
    <div class="legal">
        @include('partials.blocks', ['blocks' => $page->sections ?? [], 'ctx' => $page])
        <div class="container--narrow legal__meta"><p class="small muted">{{ __('site.last_updated') }}: {{ $page->updated_at?->translatedFormat('j F Y') }}</p></div>
    </div>
@endsection
