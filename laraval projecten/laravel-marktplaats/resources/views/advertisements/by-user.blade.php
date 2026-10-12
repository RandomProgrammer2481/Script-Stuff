@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="bg-gray-200 w-full">    
    <div class="max-w-4xl mx-auto space-y-4 bg-gray-100 border border-rounded border-gray-300">
    @include('partials.advertisement_list')
    <p>{{$advertisements->onEachSide(3)->links()}}</p>
    <div>
</div>
@endsection