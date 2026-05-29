@extends('_layouts.master')

@section('body')
    <!-- Header Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-grey-900 mb-4">Help Centre</h1>
        <p class="text-lg text-grey-600 mb-8">Find answers to common questions and learn how to get the most out of addy.io</p>

        <!-- Search Bar -->
        <div id="vue-help-search" class="w-full">
            <search></search>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-wrap -mx-4">
        <!-- Content Area -->
        <div class="w-full px-4">
            @yield('helpContent')

            <!-- Contact Section -->
            <div class="mt-16 pt-12 border-t border-grey-200">
                <div class="bg-grey-50 rounded-xl p-8 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-indigo-100 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-2 -5 24 24" width="32" height="32" preserveAspectRatio="xMinYMin" class="text-indigo-600 fill-current">
                            <path d="M18.572.083L10.676 7.12a1 1 0 0 1-1.331 0L1.416.087A2 2 0 0 1 2 0h16a2 2 0 0 1 .572.083zm1.356 1.385c.047.17.072.348.072.532v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2c0-.185.025-.364.072-.534l7.942 7.148a3 3 0 0 0 3.992 0l7.922-7.146z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-grey-900 mb-2">
                        Couldn't find what you were looking for?
                    </h3>
                    <p class="text-grey-600 mb-4">
                        We're here to help! Visit our <a href="/contact/" class="text-indigo-600 hover:text-indigo-700 font-medium underline">contact page</a> to get in touch with our support team.
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
<script type="module" src="{{ $page->vite('source/_assets/js/help-search.js') }}"></script>
@endpush
