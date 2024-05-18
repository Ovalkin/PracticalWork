<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
    @vite(['resources/js/app.js', 'resources/scss/app.scss'])
</head>
<body>

@include('header')

@switch($page)
    @case('')
        @include('main')
        @break
    @case('orders')
        @include('orders')
        @break
@endswitch


@include('footer')
</body>
</html>
