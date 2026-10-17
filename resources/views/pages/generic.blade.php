@extends('layouts.site')

@section('content')
    @include('partials.page-hero', ['title' => t($page->title), 'intro' => t($page->intro), 'crumbs' => $seo->breadcrumbs, 'image' => $page->heroImage])
    @include('partials.blocks', ['blocks' => $page->sections ?? [], 'ctx' => $page])
@endsection
