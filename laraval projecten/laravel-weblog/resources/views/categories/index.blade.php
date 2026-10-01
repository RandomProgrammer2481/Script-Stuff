@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div
    class="max-w-5xl mx-auto bg-gray-100 mt-20 p-4 shadow-md rounded-lg border-t-2 border-teal-400 dark:bg-gray-900 dark:text-white">
    <div class="flex justify-between pb-2">
        <p class="mb-2 font-semibold text-3xl">Categories</p>
    </div>

    @include('categories.create')

    <div class="border my-2 rounded-md flex flex-col">
        @foreach($categories as $category)
            <div class=" ml-3">
                <p class="text-gray-600 mt-2">
                    {{$category->name}}
                </p>
            </div>
        @endforeach
    </div>

</div>
@endsection