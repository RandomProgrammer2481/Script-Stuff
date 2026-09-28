@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="flex items-center justify-center w-full h-screen bg-gray-50 dark:bg-gray-700">
    <div class="container flex flex-col items-center">
        <div class="flex flex-col gap-6 max-w-xl text-center">
            <h2 class="font-extrabold text-9xl text-gray-600 dark:text-gray-100">
                <span class="sr-only">Error</span>403
            </h2>
            <p class="text-2xl md:text-3xl dark:text-gray-300">You are not authorized to view this page.</p>
            <a href="{{ route('blogs.index') }}" class="px-8 py-4 text-xl font-semibold rounded bg-purple-600 text-gray-50 hover:text-gray-200">Back to home</a>
        </div>
    </div>
</div>
@endsection