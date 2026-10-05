<!DOCTYPE html>
<html>
<head>
    <title>App Name - @yield('title')</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
</head>
<body>
    @include('partials.nav')
    @yield('content')
</body>
</html>