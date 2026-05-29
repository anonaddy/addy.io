@extends('_layouts.master')

@section('body')
    @php
        $categoryPosts = $posts
            ->filter(fn ($post) => $post->categories ? in_array($page->category, $post->categories, true) : false)
            ->values();
        $perPage = 10;
        $currentPath = trim($page->getPath(), '/');
        $pathSegments = explode('/', $currentPath);
        $lastSegment = end($pathSegments);
        $currentPage = is_numeric($lastSegment) ? (int) $lastSegment : 1;
        $totalPages = max(1, (int) ceil($categoryPosts->count() / $perPage));
        $pagedPosts = $categoryPosts
            ->slice(($currentPage - 1) * $perPage, $perPage)
            ->values();
        $basePath = '/blog/category/'.$page->category;
    @endphp

    <h1>{{ $page->title }}</h1>

    <hr class="border-b my-6">

    @foreach ($pagedPosts as $post)
        @include('_components.post-preview-inline')

        @if ($post != $pagedPosts->last())
            <hr class="border-b my-6">
        @endif
    @endforeach

    @if ($totalPages > 1)
        <nav class="flex text-base my-8">
            @if ($currentPage > 1)
                @php
                    $previousPage = $currentPage - 1;
                    $previousPath = $previousPage === 1 ? $basePath : $basePath.'/'.$previousPage;
                @endphp
                <a href="{{ $previousPath }}/" title="Previous Page" class="bg-grey-200 hover:bg-grey-400 rounded mr-3 px-5 py-3">&LeftArrow;</a>
            @endif

            @for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++)
                @php
                    $pagePath = $pageNumber === 1 ? $basePath : $basePath.'/'.$pageNumber;
                @endphp
                <a href="{{ $pagePath }}/" title="Go to Page {{ $pageNumber }}" class="bg-grey-200 hover:bg-grey-400 text-indigo-700 rounded mr-3 px-5 py-3 {{ $currentPage === $pageNumber ? 'text-blue-600' : '' }}">{{ $pageNumber }}</a>
            @endfor

            @if ($currentPage < $totalPages)
                @php
                    $nextPage = $currentPage + 1;
                    $nextPath = $nextPage === 1 ? $basePath : $basePath.'/'.$nextPage;
                @endphp
                <a href="{{ $nextPath }}/" title="Next Page" class="bg-grey-200 hover:bg-grey-400 rounded mr-3 px-5 py-3">&RightArrow;</a>
            @endif
        </nav>
    @endif

    @include('_components.newsletter-signup')
@stop