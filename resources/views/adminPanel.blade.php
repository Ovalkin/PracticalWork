<div class="pt-5 container" style="min-height: 900px">
    <ul class="nav nav-tabs pt-5 justify-content-center">
        <li class="nav-item">
            <a class="nav-link {{$page == '' ? 'active' : '' }}" href="/admin-panel">Главная</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{$page == 'orders' ? 'active' : '' }}" href="/admin-panel/orders">Добавить
                товар</a>
        </li>
    </ul>
    <div class="container">
        @switch($page)
            @case('')
                @break
            @case('orders')
                @include('orders')
                @break
        @endswitch
    </div>
</div>
