@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<a href="{{route('user.advertisements.index', Auth::user())}}">My Advertisements</a>
@endsection