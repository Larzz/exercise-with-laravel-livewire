@extends('layout.layout')
@section('content')
    <div class="container mx-auto px-4">
       <!--Container-->
	<div class="container w-full md:max-w-3xl mx-auto pt-20">

		<div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

			<!--Title-->
			<div class="font-sans">
            <p class="text-base md:text-sm text-green-500 font-bold">&lt; <a href="{{ route('page.index') }}" class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">BACK TO PAGES</a></p>
            <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{ $page->title }}</h1>
            <p class="text-sm md:text-base font-normal text-gray-600">Published {{ $page->created_at }}</p>
			</div>

			<!--Post Content-->

        <p class="py-6">{{ $page->content }}</p>


		</div>
		<!--Divider-->
		<hr class="border-b-2 border-gray-400 mb-8 mx-4">

	</div>
	<!--/container-->
    </div>
@endsection