@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div>
    <h2>{{$advertisement->title}}</h2>
    <h4>{{$advertisement->category->name}}<h4>
    <h4>{{$advertisement->price}}</h4>
    <br>
    <p>{{$advertisement->description}}</p>
    <br>
    @if(Auth::user() != $advertisement->user)
    <div>
        <h4> Current Highest Bid:</h4>
        <p>{{$highest_bid->user->name}}: {{$highest_bid->amount}}</p>
        <form action="{{route('bids.store', $advertisement->id)}}" method="post">
            @csrf
            <h3> Make a bid </h4>
            <label for="amount">Amount: </label>
            <br>
            <input required name="amount" id="amount" type="number" step="0.01" placeholder="{{$highest_bid->amount + 1}}" value="{{old('amount')}}">
            <br>
            <button type="submit">Confirm Bid.</button>
        </form>
    </div>
    @else
    <div>
        <h4> Bids: </h4>
        <ol>
            @foreach($ordered_bids as $bid)
            <li>
                <a href="#">
                <strong>{{$bid->user->name}}    {{$bid->created_at}}</strong>
                <p>€{{$bid->amount}}</p>
                </a>
            </li>
            @endforeach
        </ol>
    </div>
    @endif
    @include('partials.errors')
</div>
@endsection