@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

@if (Auth::user() && Auth::user()->is_premium != true)
<div
    class="max-w-3xl mx-auto bg-gray-100 mt-20 p-4 shadow-md rounded-lg border-t-2 border-teal-400 dark:bg-gray-900 dark:text-white">
    <div class="flex items-center flex-col pb-2">
        <p class="mb-12 font-semibold text-3xl">Become a premium Member?</p>
        <form method="POST" action="{{ route('premium.set') }}" class="mb-12">
            @csrf
            @method('PATCH')
            <button type="submit" class="border rounded shadow px-5 py-2">Click here!</button>
        </form>
    </div>
</div>
@else
    @include('errors.403')
@endif
@endsection