@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div>
    <div>   <!--Title -->
        <h1>{{$blog->title}}</h1>
        <h5>{{$blog->category->name}}</h6>
    </div>
    <br>
    <div>    <!--Body -->
        <p>{{$blog->body}}</p>
        <!--Image to be added-->
    </div>
</div>

<div>
    @include('partials.comments.index')
</div>
@endsection