@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="bg-gray-200 w-full">    
    <div class="max-w-4xl mx-auto space-y-4 bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
    <div class="m-4 max-w-3xl mx-auto space-y-4">
    @include('partials.advertisement_list')
    </div>
    <p class="px-4 pb-4">{{$advertisements->onEachSide(3)->links()}}</p>
    <div>
</div>
@endsection