@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div>
        <form action="{{ route('users.authenticate') }}" method="POST">
            @csrf
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" required>
            <br>
            
            <label for="password">Wachtwoord:</label>
            <input type="text" name="password" id="password" required>
            <br>
            
            <button type="submit">Log in</button>
        </form>
    </div>
@endsection