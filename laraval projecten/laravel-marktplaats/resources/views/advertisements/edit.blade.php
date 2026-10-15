@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="mx-auto max-w-2xl px-4 py-10 sm:px-6">
    <div class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm">
        <h1 class="mb-6 text-2xl font-bold text-gray-900">Edit Advertisement</h1>

        <form action="{{route('advertisements.update', $advertisement)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="mb-1 block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" name="title" id="title" placeholder="Fridge" value="{{$advertisement->title}}"
                       class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <label for="price" class="mb-1 block text-sm font-medium text-gray-700">Price:</label>
                <input type="number" step="0.01" name="price" id="price" placeholder="9.99" value="{{$advertisement->price}}"
                       class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <label for="category" class="mb-1 block text-sm font-medium text-gray-700">Category:</label>
                <select name="category_id" id="category_id" placeholder="1" value="{{$advertisement->category_id}}"
                        class="block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label style="vertical-align:top" for="description" class="mb-1 block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" id="description" cols="48" rows="32" placeholder="Type your description here"
                          class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">{{$advertisement->description}}</textarea>
            </div>

            <button type="submit"
                    class="w-full rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">
                Submit Edit
            </button>
        </form>
    </div>
</div>

@include('partials/errors_blurb')
@endsection