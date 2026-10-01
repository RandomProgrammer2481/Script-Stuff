@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if(Auth::user() && Auth::user()->id === $account->id)
    <div class="flex my-12 items-center justify-center">
        <div class="w-5xl m-auto bg-gray-100 shadow py-3 px-4 bg-gray-100 mt-20 shadow-md rounded-lg border-t-2 border-teal-400 dark:bg-gray-900 dark:text-white">
            <h2 class="mb-2 font-semibold text-3xl">My Blogs</h2>
            @include('partials.user_bloglist')
        </div>
    </div>
@else
    @include('partials.user_bloglist')
@endif
@endsection