<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
    @vite(['resources/js/app.js', 'resources/scss/app.scss'])
</head>
<body>

@include('layouts.header')

@yield('content')

@include('layouts.footer')
</body>
</html>
