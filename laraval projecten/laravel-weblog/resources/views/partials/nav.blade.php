<nav class="bg-white shadow ">
    <div class="container mx-auto items-center px-4">
        <div class="flex items-center justify-between py-6">

            <span class="flex items-center">
                <a class="text-gray-800 text-md font-semibold hover:text-purple-600 mr-4" href="{{route('blogs.index')}}">Blogs</a>
                <a class="text-gray-800 text-md font-semibold hover:text-purple-600 mr-4" href="">Categories</a>
                @if(Auth::user())
                    <a class="text-gray-800 text-md font-semibold hover:text-purple-600 mr-4" href="{{route('blogs.create')}}">New Blog</a>
                @endif
            </span>
            <span class="flex items-center">
                @if(Auth::user())
                    <a class="text-gray-800 text-md font-semibold hover:text-purple-600 mr-4" href="{{route('users.user', Auth::user())}}">My Account</a>
                    <a class="text-gray-800 text-md font-semibold hover:text-purple-600 mr-4" href="{{route('users.logout')}}">Log out.</a>
                @else
                    <a class="text-gray-800 text-md font-semibold hover:text-purple-600 mr-4" href="{{route('users.login')}}">Log in.</a>
                @endif
            </span>
        </div>
    </div>
</nav>