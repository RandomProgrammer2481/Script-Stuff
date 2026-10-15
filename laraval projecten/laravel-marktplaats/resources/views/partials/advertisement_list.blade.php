<div class="mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="flex flex-col gap-4">

    @foreach($advertisements as $advertisement)
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5 transition hover:shadow-md">
        <a href="{{route('advertisements.show', $advertisement)}}" class="block">
            <span>
                <div class="border-b border-gray-100 pb-3">
                    <h3 class="text-xl font-bold text-gray-900">@if($advertisement->is_promoted) ★ @endif{{$advertisement->title}}</h3>
                    <div class="mt-1 flex flex-wrap gap-x-4 gap-y-1">
                        <h6 class="text-xs text-gray-500">Posted by: {{$advertisement->user->name}}</h6>
                        <h6 class="text-xs font-medium text-indigo-700">{{$advertisement->category->name}}</h6>
                        <h6 class="text-xs text-gray-500">Posted at: {{$advertisement->created_at}}</h6>
                    </div>
                </div>
                <div class="mt-3 flex flex-wrap gap-x-8 gap-y-1">
                    <h6 class="text-sm font-semibold text-gray-900">Asking Price: €{{$advertisement->price}}</h6>
                    <h6 class="text-sm font-semibold text-emerald-600">Current Highest Bid: {{$advertisement->bids()->first()? "€" . $advertisement->bids()->orderBy('amount', 'desc')->first()->amount: "N/a"}}</h6>
                </div>
            </span>
            <h6 class="mt-3 text-sm text-gray-600">{{$advertisement->description}}</h6>
            @if(Auth::check() && $advertisement->user == Auth::user())
            <div class="mt-4 flex items-center gap-2 border-t border-gray-100 pt-3">
                @if($advertisement->is_promoted != 1)
                <form method="get" action="{{ route('advertisements.promote', $advertisement) }}" style="display:inline">
                    <button type="submit" class="rounded-md bg-amber-500 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-amber-400">Promote</button>
                </form>
                @endif
                <form method="get" action="{{ route('advertisements.edit', $advertisement) }}" style="display:inline">
                    @csrf
                    <button type="submit" class="rounded-md border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 transition hover:bg-gray-100">Edit</button>
                </form>
                <form method="POST" action="{{ route('advertisements.delete', $advertisement) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this advertisement?')" class="rounded-md px-3 py-1.5 text-xs font-medium text-red-600 transition hover:bg-red-50">Delete</button>
                </form>
            </div>
            @endif
        </a>
    </div>
    @endforeach

    </div>
</div>