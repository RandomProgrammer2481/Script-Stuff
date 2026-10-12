
    @foreach($advertisements as $advertisement)
    <div class="bg-white border border-gray-200 rounded shadow-sm p-4">    
        <a href="{{route('advertisements.show', $advertisement)}}" class="block">
            <span>
                <div>
                    <h3 class="text-xl font-bold">@if($advertisement->is_promoted) ★ @endif{{$advertisement->title}}</h3>
                    <h6>Posted by: {{$advertisement->user->name}}</h6>
                    <h6>{{$advertisement->category->name}}</h6>
                    <h6>Posted at: {{$advertisement->created_at}}</h6>
                </div>
                <h6>Asking Price: €{{$advertisement->price}}</h6>
                <h6>Current Highest Bid: {{$advertisement->bids()->first()? "€" . $advertisement->bids()->orderBy('amount', 'desc')->first()->amount: "N/a"}}</h6>
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
        </a>
    </div>
    @endforeach
