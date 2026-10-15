<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-between gap-y-2 py-3">

            
            <div class="flex items-center gap-1">
                <a href="{{ route('advertisements.index') }}"
                   class="rounded-md px-3 py-2 text-sm font-medium transition
                          {{ request()->routeIs('advertisements.index') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                    Advertisements
                </a>

                @auth
                    <a href="{{ route('dashboard') }}"
                       class="rounded-md px-3 py-2 text-sm font-medium transition
                              {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('chats.index', Auth::user()) }}"
                       class="rounded-md px-3 py-2 text-sm font-medium transition
                              {{ request()->routeIs('chats.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                        Chats
                    </a>
                @endauth
            </div>

            
            <div class="flex items-center gap-2">
                @auth
                    <a href="{{ route('advertisements.create') }}"
                       class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">
                        + New Advertisement
                    </a>

                    <a href="{{ route('logout') }}"
                       class="rounded-md px-3 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-100 hover:text-gray-900">
                        Logout
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="rounded-md px-3 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-100 hover:text-gray-900">
                        Login
                    </a>

                    <a href="{{ route('users.create') }}"
                       class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">
                        Create Account
                    </a>
                @endauth
            </div>

        </div>
    </div>
</nav>