@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="mx-auto max-w-md px-4 py-10 sm:px-6">
    <div class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm">
        <h1 class="mb-6 text-2xl font-bold text-gray-900">Reset Password</h1>

        <form action="{{route('password.update')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="mb-1 block text-sm font-medium text-gray-700">Enter Email:</label>
                <input type="email" name="email" id="email" placeholder="email@example.net" value="{{old('email')}}"
                       class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <label for="password" class="mb-1 block text-sm font-medium text-gray-700">Enter Password:</label>
                <input type="password" name="password" id="password" placeholder="********"
                       class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="mb-1 block text-sm font-medium text-gray-700">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="********"
                       class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
            </div>

            <input type="hidden" name="token" id="token" value="{{$token}}">
            <button type="submit"
                    class="w-full rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">
                Register
            </button>
        </form>
    </div>
</div>

@include('partials/errors_blurb')
@endsection