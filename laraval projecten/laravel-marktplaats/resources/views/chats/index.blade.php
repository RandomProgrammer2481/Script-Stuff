@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="flex-col bg-gray-200 w-full">
    <div class="max-w-3xl mx-auto my-8 space-y-3 rounded-xl border border-gray-300 bg-gray-100 p-6 shadow-sm">
    
        <p class="mb-2 text-3xl font-bold text-gray-900">Your Chats</p>

        @if(!empty($chats))
        @foreach($chats as $chat)
        <div class="rounded-xl border border-gray-200 bg-white shadow-sm transition hover:border-indigo-300 hover:shadow-md">
            <a href="{{ route('chats.show', $chat) }}" class="block p-4">
                <h2 class="text-lg font-semibold text-gray-900">{{$chat->user_1 != Auth::user() ? $chat->user_1->name : $chat->user_2->name}}</h2>
                <p class="mt-1 truncate text-sm text-gray-600">{{$chat->messages->first()->body}}</p>
            </a>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection