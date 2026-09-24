@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div>
        <form action="{{ route('blogs.store') }}" method="POST">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" id="title">
            <br>
            
            <label for="category">Category:</label> 
            <select name="category" id="category">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <br>

            <label for="premium">Is this a premium article?</label>
            <input type="checkbox" name="premium" id="premium" value="premium">

            <label for="body"><h3>Blog:</h3></label>
            <textarea name="body" id="body" cols="48" rows="32"></textarea>
            <br>
            <button type="submit">Post Blog</button>
        </form>
    </div>
@endsection