<ul class="flex flex-col pl-1 bg-white border rounded-lg shadow-lg divide-y divide-gray-200">
    @foreach($sorted_blogs as $blog)
        @if(Auth::check() && Auth::user()->id == $blog->user_id)
            <li class="px-6 py-4">
                <div class="flex justify-between">
                    <span class="font-semibold text-lg">{{ $blog->title }}</span>
                    <span class="text-gray-500 text-xs">
                        {{ $blog->created_at }}
                    </span>
                </div>
                <span class="flex justify-between">
                    <p class="text-gray-700">{{$make_blurb($blog->body)}}</p>
                    <div class="flex gap-2">
                        <form action="{{route('blogs.edit', $blog->id)}}" method="GET" class="items-center">
                            @csrf
                            <button type="submit"
                                    class="bg-blue-700 text-white px-6 py-2.5 rounded-md font-semibold hover:bg-blue-500 transition">
                                    Edit
                            </button> 
                        </form>
                        <form action="{{route('blogs.destroy', $blog->id)}}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button action="{{route('blogs.destroy', $blog)}}"
                                    class="bg-red-700 text-white px-4 py-2.5 rounded-md font-semibold hover:bg-red-500 transition">
                                    Delete
                            </button>
                        </form>
                    </div>
                </span>
            </li>
        @elseif(!$blog->is_premium || (Auth::check() && Auth::user()->is_premium))
            <li class="px-6 py-4">
                <div class="flex justify-between">
                    <span class="font-semibold text-lg">{{ $blog->title }}</span>
                    <span class="text-gray-500 text-xs">{{ $blog->created_at }}</span>
                </div>
                <p class="text-gray-700">{{$make_blurb($blog->body)}}</p>
            </li>
        @endif
    @endforeach
</ul>