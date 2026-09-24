<ul>
    @foreach($sorted_blogs as $blog)
        @if(!$blog->is_premium || (Auth::check() && (Auth::user()->is_premium || Auth::user()->id == $blog->user_id)))
        <li>
            <a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }} {{ $blog->created_at }}</a>
        </li>
        @endif
    @endforeach
</ul>