@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if(Auth::user()->id === $account->id)
    <h2>My Blogs</h2>
    @include('partials.blog_list')
@else
    <h2>{{$account->name}}'s Blogs</h2>
    @include('partials.blog_list')
@endif
@endsection