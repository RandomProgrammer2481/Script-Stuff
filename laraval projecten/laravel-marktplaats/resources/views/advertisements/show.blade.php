@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="mx-auto max-w-3xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm">
        <h2 class="text-2xl font-bold text-gray-900">{{$advertisement->title}}</h2>
        <h4 class="mt-2 inline-block rounded-full bg-indigo-50 px-2.5 py-0.5 text-xs font-medium text-indigo-700">{{$advertisement->category->name}}</h4>
        <h4 class="mt-3 text-xl font-semibold text-gray-900">€{{$advertisement->price}}</h4>
        <br>
        <p class="text-sm text-gray-600">{{$advertisement->description}}</p>
        <br>
        @if(Auth::user() != $advertisement->user)
        <div class="mt-4 border-t border-gray-100 pt-6">
            <div class="mb-6 rounded-lg bg-emerald-50 p-4">
                <h4 class="text-xs font-medium uppercase tracking-wide text-emerald-700"> Current Highest Bid:</h4>
                <p class="mt-1 text-lg font-semibold text-emerald-800">{{$highest_bid->user->name}}: €{{$highest_bid->amount}}</p>
            </div>
            <form action="{{route('bids.store', $advertisement->id)}}" method="post">
                @csrf
                <h4 class="mb-3 text-lg font-bold text-gray-900"> Make a bid </h4>
                <label for="amount" class="mb-1 block text-sm font-medium text-gray-700">Amount: </label>
                <input required name="amount" id="amount" type="number" step="0.01" placeholder="{{$highest_bid->amount + 1}}" value="{{old('amount')}}"
                       class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                <button type="submit"
                        class="mt-4 w-full rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">Confirm Bid.</button>
            </form>
        </div>
        @else
        <div class="mt-4 border-t border-gray-100 pt-6">
            <h4 class="mb-3 text-lg font-bold text-gray-900"> Bids: </h4>
            <ol class="space-y-2">
                @foreach($ordered_bids as $bid)
                <li>
                    <a href="{{ route('chats.create', $bid->user) }}" class="block rounded-lg border border-gray-200 p-3 transition hover:border-indigo-300 hover:bg-indigo-50">
                    <strong class="text-sm text-gray-900">{{$bid->user->name}}    {{$bid->created_at}}</strong>
                    <p class="text-sm font-semibold text-emerald-600">€{{$bid->amount}}</p>
                    </a>
                </li>
                @endforeach
            </ol>
        </div>
        @endif
        <div class="mt-6">
            @include('partials/errors_blurb')
        </div>
    </div>
</div>
@endsection