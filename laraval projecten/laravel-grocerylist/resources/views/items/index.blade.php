<h1>Items</h1>

<table>
    <thead>
        <tr>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th colspan="2" >Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Verwijderen</button>
                    </form>
                    <td>
                        <a href="{{ route('items.edit', $item->id) }}">Bewerken</a>
                    </td>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <p>This is the content for the page.</p>
@endsection