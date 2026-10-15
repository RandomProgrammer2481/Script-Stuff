@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="bg-gray-200 w-full">    
    <div class="max-w-4xl mx-auto space-y-4 bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <form method="GET" action="{{ route('advertisements.index') }}" 
        class="flex flex-wrap justify-center items-center gap-3 bg-gray-50 border-b border-gray-200 p-4">
                <div class="flex flex-1 items-center overflow-hidden rounded-md border border-gray-300 bg-white shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
                    <label for="search" class="bg-gray-100 px-3 py-2 text-sm font-medium text-gray-500">></label>
                    <input type="text" name="search" id="search" placeholder="Type your search here" value="{{old('search')}}" class="block w-full border-0 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-0">
                </div>
                <div class="flex items-center overflow-hidden rounded-md border border-gray-300 bg-white shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500"> 
                    <label for="category" class="border-r border-gray-300 bg-gray-100 px-3 py-2 text-sm font-medium text-gray-700">Category:</label>
                    <select name="category" id="category" class="border-0 bg-white px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-0">
                        <option value="">None</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected(request('category') == $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">Search</button>
        </form>
        <div class="m-4 max-w-3xl mx-auto space-y-4">
            @include('partials.advertisement_list')
        </div>
        <p class="px-4 pb-4">{{$advertisements->onEachSide(3)->links()}}</p>
    </div>
</div>
@endsection