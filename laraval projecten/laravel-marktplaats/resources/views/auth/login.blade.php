@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="flex bg-gray-200 w-full h-screen">    
    <div class="max-w-3xl my-auto mx-auto justify-center center-items p-6 bg-gray-100 border border-rounded border-gray-300">
        <form action="{{route('sessions.store')}}" method="POST">
            <label for="email">Enter Email:</label>
            <input type="email" name="email" id="email" placeholder="email@example.net" value="{{old('email')}}" class="border border-rounded border-gray-300">
            <br>
            <label for="password">Enter Password:</label>
            <input type="password" name="password" id="password" placeholder="********" class="border border-rounded border-gray-300">
            <br>
            <a href="{{route('password.request')}}" class="text-sm text-blue-600">Forgot your password?<a>
            <br>
            <label for="remember">Remember me:</label> 
            <input type="checkbox" name="remember" id="remember" value="true">
            <br>
            <button type="submit" class="border border-rounded border-gray-300 px-2">Login</button>
        </form>
    </div>
</div>
@endsection

@include('partials/errors')