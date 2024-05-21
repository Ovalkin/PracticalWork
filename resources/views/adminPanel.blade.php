@extends('layouts.app')
@section('content')
    <div class="pt-5 container" style="min-height: 900px">
        <ul class="nav nav-tabs pt-3 justify-content-center">
            <li class="nav-item">
                <a class="nav-link {{$page == '' ? 'active' : '' }}" href="/admin-panel">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{$page == 'orders' ? 'active' : '' }}" href="/admin-panel/orders">Принять заказ от
                    пользователей</a>
            </li>
        </ul>
        <div>
            @yield('adminContent')
        </div>
    </div>
@endsection
