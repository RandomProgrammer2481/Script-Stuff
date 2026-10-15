@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="mx-auto max-w-md px-4 py-10 sm:px-6">
    <div class="rounded-xl border border-amber-300 bg-white p-8 text-center shadow-sm ring-1 ring-amber-200">
        <h2 class="text-xl font-bold text-gray-900">Do you want to promote {{$advertisement->title}} for €10?</h2>
        <form action="{{route('advertisements.update', $advertisement)}}" method="POST" class="mt-6">
            @csrf
            @method('PUT')
            <input type="hidden" name="is_promoted" id="is_promoted" value="1">
            <button type="Submit"
                    class="w-full rounded-md bg-amber-500 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-400">Pay $10</button>
        </form>
    </div>
</div>
@endsection