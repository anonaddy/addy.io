@extends('_layouts.master')

@section('body')
    <h1 class="leading-none">{{ $page->title }}</h1>

    <div class="text-grey-700 text-base mb-6 md:mt-0 flex items-center">
        Last Updated: {{ date('F j, Y', $page->date) }}
        <span class="mx-2">•</span>
        @if ($page->helpCategories)
            @foreach ($page->helpCategories as $i => $category)
                <a
                    href="{{ '/help/category/' . $category }}/"
                    title="View articles in {{ $category }}"
                    class="inline-block bg-indigo-700 hover:bg-indigo-800 leading-loose tracking-wide text-white uppercase text-2xs font-semibold rounded mr-4 px-2 pt-px"
                >{{ $category }}</a>
            @endforeach
        @endif
    </div>

    <div v-pre>
        @yield('content')
    </div>

@endsection