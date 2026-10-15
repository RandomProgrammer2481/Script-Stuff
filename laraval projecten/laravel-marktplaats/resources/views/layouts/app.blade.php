<!DOCTYPE html>
<html>
<head>
    <title>App Name - @yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> 
</head>
<body class="min-h-screen bg-gray-200 font-sans text-gray-900 antialiased">
    @include('partials.nav')
    <main>
        @yield('content')
    </main>
</body>
</html>