@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="flex-grow container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Edit your post!</h1>
        
        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" id="title" name="title" required
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="{{$blog->title}}" value="{{$blog->title}}">
            </div>

            <div class="mb-4">
                <label for="Category" class="block text-gray-700 font-semibold mb-2">Category<label>
                <select name="category" id="category" value="$blog->category_id"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="premium" class="block text-gray-700 font-semibold mb-2">Is this a premium article?</label>
                <input type="checkbox" name="premium" id="premium" value="premium">
            </div>

            <div class="mb-4">
                <label for="body" class="block text-gray-700 font-semibold mb-2">Text</label>
                <textarea id="body" name="body" cols="32" rows="16" required 
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{$blog->body}}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                        class="bg-blue-700 text-white px-6 py-2.5 rounded-md font-semibold hover:bg-blue-500 transition">
                    Edit Post
                </button>
            </div>
        </form>
    </div>
@endsection