@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if($chat->user_1->id == Auth::id() || $chat->user_2->id == Auth::id())
    <div class="max-w-3xl mx-auto my-6 flex min-h-[70vh] flex-col rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
        <p class="mb-4 border-b border-gray-100 pb-4 text-2xl font-bold text-gray-900">{{ $chat->user_1->name }} and {{ $chat->user_2->name }}'s Chat</p>

        <div class="flex flex-col gap-3 flex-1">
            @foreach($messages as $message)
                @php $mine = $message->user->id === Auth::id(); @endphp

                <div class="w-fit max-w-[80%] rounded-2xl px-4 py-2 shadow-sm {{ $mine ? 'self-end rounded-br-sm bg-indigo-600 text-white' : 'self-start rounded-bl-sm border border-gray-200 bg-gray-100 text-gray-900' }}">
                    <div class="flex justify-between items-baseline gap-4">
                        <h2 class="text-sm font-semibold">{{ $message->user->name }}</h2>
                        <span class="text-xs {{ $mine ? 'text-indigo-200' : 'text-gray-500' }}">{{ $message->created_at->format('d M H:i') }}</span>
                    </div>
                    <p class="mt-1 text-sm break-words {{ $mine ? 'text-white' : 'text-gray-700' }}">{{ $message->body }}</p>
                </div>
            @endforeach
        </div>

        <form action="{{ route('messages.store', $chat) }}" method="POST" class="mt-6 flex gap-2 border-t border-gray-100 pt-4">
            @csrf
            <input
                type="text"
                name="body"
                id="body"
                placeholder="Type a message..."
                value="{{ old('body') }}"
                autocomplete="off"
                required
                class="flex-1 min-w-0 rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
            >
            <button
                type="submit"
                class="shrink-0 rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500"
            >
                Send
            </button>
        </form>
    </div>
@else
    @include('partials.errors.404')
@endif
@endsection