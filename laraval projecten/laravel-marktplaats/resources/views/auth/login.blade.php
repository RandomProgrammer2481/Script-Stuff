@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="flex bg-gray-200 w-full min-h-screen">    
    <div class="w-full max-w-md my-auto mx-auto p-8 bg-white border border-gray-200 rounded-xl shadow-sm">
        <h1 class="mb-6 text-2xl font-bold text-gray-900">Login</h1>
        <form action="{{route('sessions.store')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="mb-1 block text-sm font-medium text-gray-700">Enter Email:</label>
                <input type="email" name="email" id="email" placeholder="email@example.net" value="{{old('email')}}" class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
            </div>

            <div class="mb-2">
                <label for="password" class="mb-1 block text-sm font-medium text-gray-700">Enter Password:</label>
                <input type="password" name="password" id="password" placeholder="********" class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <a href="{{route('password.request')}}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
            </div>

            <div class="mb-6 flex items-center gap-2">
                <input type="checkbox" name="remember" id="remember" value="true" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for="remember" class="text-sm text-gray-700">Remember me:</label>
            </div>

            <button type="submit" class="w-full rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">Log in.</button>
        </form>
    </div>
</div>
@include('partials/errors_blurb')
@endsection

