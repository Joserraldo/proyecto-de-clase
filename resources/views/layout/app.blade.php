<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title') </title>
</head>
<body>
    @include ('layout.navbar')
    @yield('content') 
    @include ('layout.footer')
</body>
</html>