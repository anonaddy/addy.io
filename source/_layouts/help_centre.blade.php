@extends('_layouts.master')

@section('body')
    <div class="flex flex-1 items-center relative">
        <h1 class="mb-0">Help Centre</h1>
        <div id="vue-help-search" class="flex flex-1">
            <search></search>
        </div>
    </div>

    <hr class="border-b mt-6 mb-10">

    <div class="flex flex-wrap -mx-4">
        <div class="w-full md:w-1/5 px-4">
            <p class="block mb-4 text-sm uppercase text-grey-400 tracking-wide">
                Categories
            </p>

            <ul>
                @foreach ($helpCategories as $category)
                    <li class="list-none">
                        <a href="{{ $category->getUrl() }}/" class="block px-3 py-2  x rounded-sm {{ $page->isActive($category->getPath()) ? 'text-indigo-900 bg-indigo-50' : 'hover:bg-grey-50 hover:bg-grey-50' }}">
                            {{ $category->title }}
                        </a>
                    </li>
                @endforeach
            </ul>

        </div>
        <div class="w-full md:w-4/5 px-4">
            @yield('helpContent')
            <hr class="border-b my-10">
            <div class="flex flex-wrap justify-center items-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-2 -5 24 24" width="48" height="48" preserveAspectRatio="xMinYMin" class="text-indigo-600 fill-current"><path d="M18.572.083L10.676 7.12a1 1 0 0 1-1.331 0L1.416.087A2 2 0 0 1 2 0h16a2 2 0 0 1 .572.083zm1.356 1.385c.047.17.072.348.072.532v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2c0-.185.025-.364.072-.534l7.942 7.148a3 3 0 0 0 3.992 0l7.922-7.146z"></path></svg>
                </div>
                <div class="text-center md:text-left px-4">
                    <h3 class="text-lg">
                        Couldn't find what you were looking for?
                    </h3>
                    <h4 class="my-0 text-base">
                        Send an email to <a href="mailto:contact@anonaddy.com">contact@anonaddy.com</a> (<a href="/anonaddy-contact-public-key.asc">GPG Key</a>)
                    </h4>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
<script src="{{ mix('js/help-search.js', 'assets/build') }}"></script>
@endpush
