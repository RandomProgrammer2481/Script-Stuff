<div>
    @foreach($advertisements as $advertisement)
    <div>
        <span>
            <div>
                <h3>{{$advertisement->title}}</h3>
                <h6>{{$advertisement->category->name}}</h6>
            <div>
            <h6>€{{$advertisement->price}}</h6>
        </span>
        <h6>{{$advertisement->description}}</h6>
        @if(Auth::check() && $advertisement->user == Auth::user())
        <form method="get" action="{{ route('advertisements.edit', $advertisement) }}" style="display:inline">
            @csrf
            <button type="submit">Edit</button>
        </form>
        <form method="POST" action="{{ route('advertisements.delete', $advertisement) }}" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Delete this advertisement?')">Delete</button>
        </form>
        @endif
    </div>
    @endforeach
</div>