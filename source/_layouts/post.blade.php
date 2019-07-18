@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')
    @if ($page->cover_image)
        <img src="{{ $page->cover_image }}" alt="{{ $page->title }} cover image" class="mb-2">
    @endif

    <h1 class="leading-none mb-2">{{ $page->title }}</h1>

    <div class="text-grey-700 text-xl mb-1 md:mt-0 flex items-center">
        {{ date('F j, Y', $page->date) }}
        <span class="mx-2">•</span>
        @if ($page->categories)
            @foreach ($page->categories as $i => $category)
                <a
                    href="{{ '/blog/categories/' . $category }}"
                    title="View posts in {{ $category }}"
                    class="inline-block bg-indigo-700 hover:bg-indigo-800 leading-loose tracking-wide text-white uppercase text-2xs font-semibold rounded mr-4 px-2 pt-px"
                >{{ $category }}</a>
            @endforeach
        @endif
    </div>


    <div class="border-b border-indigo-200 mt-6 mb-10 pb-4" v-pre>
        @yield('content')
    </div>

    <nav class="flex justify-between text-sm md:text-base">
        <div>
            @if ($next = $page->getNext())
                <a href="{{ $next->getUrl() }}" title="Older Post: {{ $next->title }}">
                    &LeftArrow; {{ $next->title }}
                </a>
            @endif
        </div>

        <div>
            @if ($previous = $page->getPrevious())
                <a href="{{ $previous->getUrl() }}" title="Newer Post: {{ $previous->title }}">
                    {{ $previous->title }} &RightArrow;
                </a>
            @endif
        </div>
    </nav>

    @include('_components.newsletter-signup')
@endsection

@push('scripts')
<script src="{{ mix('js/main.js', 'assets/build') }}"></script>
@endpush