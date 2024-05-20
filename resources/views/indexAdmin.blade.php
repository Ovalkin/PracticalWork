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
        @include('adminPanel')
        @break
    @case('orders')
        @include('orders')
        @break
    @case('admin-panel')
        @include('adminPanel')
        @break
@endswitch


@include('footer')
</body>
</html>
