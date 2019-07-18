---
title: "Confirm Subscription"
---

@extends('_layouts.master')

@section('body')
<div class="container max-w-5xl mx-auto m-8">
	<h1 class="w-full text-5xl font-bold leading-tight text-center text-grey-800">Confirm Subscription</h1>
	<div class="w-full mt-4 mb-12">
		<div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
	</div>

	<div class="text-grey-600 text-center">
			<h4 class="text-xl text-grey-800 font-bold leading-none mb-3">Please check your inbox to confirm your email</h4>
			<p class="mb-4">
				We just sent you an email containing a link you need to click to confirm your email. You won't receive anything from us until you do so. Make sure to check your spam folder too.
			</p>
	</div>
	<div class="w-full py-6 flex justify-center">
		<img class="w-full md:w-3/5" src="/assets/img/inbox.svg">
	</div>

</div>
@stop