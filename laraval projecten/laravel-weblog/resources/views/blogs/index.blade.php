@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div
    class="max-w-5xl mx-auto bg-gray-100 mt-20 p-4 shadow-md rounded-lg border-t-2 border-teal-400 dark:bg-gray-900 dark:text-white">
    <div class="flex justify-between pb-4">
        <p class="mb-2 font-semibold text-3xl">Newest Blogs</p>
    </div>

    <ul class="flex flex-col pl-1 bg-white rounded-lg shadow divide-y divide-gray-200">
        @foreach($sorted_blogs as $blog)
            @if(!$blog->is_premium || (Auth::check() && (Auth::user()->is_premium || Auth::user()->id == $blog->user_id)))
                <li class="px-6 py-4">
                    <a href="{{ route('blogs.show', $blog->id)}}">
                        <div class="flex justify-between">
                            <span class="font-semibold text-lg">{{ $blog->title }}</span>
                            <span class="text-gray-500 text-xs">{{ $blog->created_at }}<br>{{$blog->category->name}}</span>
                        </div>
                        <p class="text-gray-700">{{$make_blurb($blog->body)}}</p>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
@endsection

