@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="min-h-screen bg-gray-200 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">

            <div class="max-w-md mx-auto">
                <div>
                    <h1 class="text-2xl font-semibold">Login</h1>
                </div>
                <div class="divide-y divide-gray-200">
                    <form action="{{ route('users.authenticate') }}" method="POST" class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        @csrf
                        <div class="relative">
                            <input required autocomplete="off" id="email" name="email" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Email address" />
                            <label for="email" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email Address</label>
                        </div>
                        <div class="relative">
                            <input required autocomplete="off" id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Password" />
                            <label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                        </div>
                        <div class="relative">
                            <button type="submit" class="bg-cyan-500 text-white rounded-md px-2 py-1">Invoeren</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection