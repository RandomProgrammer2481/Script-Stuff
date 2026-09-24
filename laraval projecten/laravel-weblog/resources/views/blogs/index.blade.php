@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<h2> Blogs by Newest</h2>

@include('partials.blog_list')
@endsection