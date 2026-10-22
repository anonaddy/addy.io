---
title: "Subscription Failed"
---

@extends('_layouts.master')

@section('body')
<div class="container max-w-5xl mx-auto m-8">
	<h1 class="w-full text-5xl font-bold leading-tight text-center text-grey-800 dark:text-white">We Could Not Sign You Up</h1>
	<div class="w-full mt-4 mb-12">
		<div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
	</div>

	<div class="text-grey-600 dark:text-muted text-center">
			<p class="mb-4">
				Please go back and try again. Complete the captcha to receive the newsletter.
			</p>
			<p>
				<a href="/blog/" class="text-indigo-700 dark:text-link font-medium">Back to the blog</a>
			</p>
	</div>
</div>
@stop
