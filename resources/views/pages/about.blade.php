@extends('layouts.site')

@section('content')
    @include('partials.page-hero', ['title' => t($page->title), 'intro' => t($page->intro), 'crumbs' => $seo->breadcrumbs, 'image' => $page->heroImage, 'art' => 'about', 'eyebrow' => __('site.about_eyebrow')])
    @include('partials.blocks', ['blocks' => $page->sections ?? [], 'ctx' => $page, 'faqTopic' => 'general'])
@endsection
