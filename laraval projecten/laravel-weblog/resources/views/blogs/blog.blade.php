@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<main class="container bg-gray-100 mx-auto mt-8 max-w-6xl mx-auto bg-gray-100 mt-20 p-4 shadow-md rounded-lg dark:bg-gray-900 dark:text-white">
    <div class="flex flex-wrap justify-between">
        <div class="w-full md:w-8/8 px-4 mb-8">
            <span class="flex justify-between">
                <div class="w-full md:w-8/12 px-4 mb-8">
                    <h2 class="text-4xl font-bold mt-4 mb-2">{{$blog->title}}</h2>
                    <h6 class="text-sm font-semibold italic mt-4 mb-2">by {{$blog->user->name}}</h2>
                    <p class="text-gray-700 mb-4">{{$blog->body}}</p>
                </div>
                <div class="w-full md:w-4/12 px-4 mb-8">
                    @if($blog->img_path)
                    <img src="{{ asset('storage/' . $blog->img_path) }}" alt="{{ $blog->title }}" alt="Featured Image" class="w-full h-fit min-w-80 min-h-80 object-cover rounded">
                    @endif
                    <div class="bg-gray-100 px-4 py-6 rounded">
                        <h3 class="text-lg font-bold mb-2">Category</h3>
                        <ul class="list-disc list-inside">
                            <li><a href="{{route('categories.index')}}" class="text-gray-700 hover:text-gray-900">{{$blog->category->name}}</a></li>
                        </ul>
                    </div>   
                </div>
            </span>
            <div>
                    @include('partials.comments.index')
            </div>
        </div>
    </div>
</main>


@endsection