---
pagination:
    collection: posts
    perPage: 10
title: "Blog"
description: The list of all blog posts for AnonAddy. You'll find information about site updates, announcements and how to guides.
---

@extends('_layouts.master')

@section('body')
    <div class="flex flex-1 items-center relative">
        <h1 class="mb-0">Blog</h1>
        <div id="vue-search" class="flex flex-1">
            <search :index="/index.json"></search>
        </div>
    </div>

    <hr class="border-b my-6">

    @foreach ($pagination->items as $post)
        @include('_components.post-preview-inline')

        @if ($post != $pagination->items->last())
            <hr class="border-b my-6">
        @endif
    @endforeach

    @if ($pagination->pages->count() > 1)
        <nav class="flex text-base my-8">
            @if ($previous = $pagination->previous)
                <a
                    href="{{ $previous }}/"
                    title="Previous Page"
                    class="bg-grey-200 hover:bg-grey-400 rounded mr-3 px-5 py-3"
                >&LeftArrow;</a>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a
                    href="{{ $path }}/"
                    title="Go to Page {{ $pageNumber }}"
                    class="bg-grey-200 hover:bg-grey-400 text-indigo-700 rounded mr-3 px-5 py-3 {{ $pagination->currentPage == $pageNumber ? 'text-blue-600' : '' }}"
                >{{ $pageNumber }}</a>
            @endforeach

            @if ($next = $pagination->next)
                <a
                    href="{{ $next }}/"
                    title="Next Page"
                    class="bg-grey-200 hover:bg-grey-400 rounded mr-3 px-5 py-3"
                >&RightArrow;</a>
            @endif
        </nav>
    @endif

    @include('_components.newsletter-signup')

@stop

@push('scripts')
<script src="{{ mix('js/search.js', 'assets/build') }}"></script>
@endpush
