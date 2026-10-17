@extends('layouts.site', ['bodyClass' => 'page-home'])

@section('content')
    @include('partials.blocks', ['blocks' => $page->sections ?? [], 'ctx' => $page])
@endsection
