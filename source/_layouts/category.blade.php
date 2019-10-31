@extends('_layouts.master')

@section('body')
    <h1>{{ $page->title }}</h1>

    <div class="text-2xl">
        @yield('content')
    </div>

    <hr class="border-b my-6">

    @foreach ($page->posts($posts) as $post)
        @include('_components.post-preview-inline')

        @if (! $loop->last)
            <hr class="border-b my-6">
        @endif
    @endforeach

    @include('_components.newsletter-signup')
@stop