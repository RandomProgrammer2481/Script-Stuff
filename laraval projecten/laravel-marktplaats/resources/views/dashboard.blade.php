@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="bg-gray-200 w-full">
    <div class=" mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="grid gap-4 sm:grid-cols-3">
            <a href="{{route('user.advertisements.index', Auth::user())}}"
            class="block rounded-xl border border-gray-200 bg-white p-6 text-center text-sm font-semibold text-gray-900 shadow-sm transition hover:border-indigo-300 hover:shadow-md">
                My Advertisements
            </a>
            <a href="{{route('chats.index', Auth::user())}}"
            class="block rounded-xl border border-gray-200 bg-white p-6 text-center text-sm font-semibold text-gray-900 shadow-sm transition hover:border-indigo-300 hover:shadow-md">
                My Chats
            </a>
            <a href="{{route('advertisements.create')}}"
            class="block rounded-xl bg-indigo-600 p-6 text-center text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">
                New Advertisement
            </a>
        </div>
    </div>
</div>

@endsection