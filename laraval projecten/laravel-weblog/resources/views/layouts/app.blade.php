<!DOCTYPE html>
<html>
<head>
    <title>App Name - @yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans w-full min-h-screen m-0">
    @include('partials.nav')
    @yield('content')
</body>
</html>