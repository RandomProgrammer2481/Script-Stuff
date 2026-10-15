@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="mx-auto max-w-md px-4 py-10 sm:px-6">
    <div class="rounded-xl border border-gray-200 bg-white p-8 text-center shadow-sm">
        <h1 class="text-2xl font-bold text-gray-900"> GO AND VERIFY YOUR EMAIL PLEASE </h1>
        <h5 class="mt-4 text-sm text-gray-600"> If you did not receive an verification email <a href="{{Route( 'verification.send' )}}" class="font-medium text-indigo-600 underline hover:text-indigo-500">click here<a></h5>
    </div>
</div>
@endsection