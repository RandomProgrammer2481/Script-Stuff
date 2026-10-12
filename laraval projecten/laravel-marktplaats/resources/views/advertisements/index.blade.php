@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="bg-gray-200 w-full">    
    <div class="max-w-4xl mx-auto space-y-4 bg-gray-100 border border-rounded border-gray-300">
        <form method="GET" action="{{ route('advertisements.index') }}" 
        class="flex justify-center items-center bg-white border border-rounded border-gray-200 shadow-sm py-3 space-x-2">
                <div class="border border-rounded border-gray-300 bg-gray-200">
                    <label for="search">></label>
                    <input type="text" name="search" id="search" placeholder="Type your search here" value="{{old('search')}}">
                </div>
                <div class="border border-rounded border-gray-300 bg-gray-100"> 
                    <label for="category" class=" border-gray-300 border-r bg-gray-200 px-1">Category:</label>
                    <select name="category" id="category">
                        <option value="">None</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected(request('category') == $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="border border-rounded border-gray-300 bg-gray-200 px-1">Search</button>
        </form>
        <div class="m-4 max-w-3xl mx-auto space-y-4">
            @include('partials.advertisement_list')
        </div>
        <p>{{$advertisements->onEachSide(3)->links()}}</p>
    </div>
</div>
@endsection