<div class="container pt-5" style="min-height: 900px">
    <div class="mt-5">
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item flex-fill w-25">Заказчик</li>
            <li class="list-group-item flex-fill w-25">Название товара</li>
            <li class="list-group-item flex-fill w-25">Колличество</li>
            <li class="list-group-item flex-fill w-25">Адрес</li>
            <li class="list-group-item flex-fill w-25">Статус</li>
        </ul>
        @foreach($orders as $order)
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item flex-fill w-25" title="{{$order['userName']}}">{{$order['userName']}}</li>
                <li class="list-group-item flex-fill w-25" title="{{$order['product_name']}}">{{$order['product_name']}}</li>
                <li class="list-group-item flex-fill w-25" title="{{$order['quantity']}}">{{$order['quantity']}}</li>
                <li class="list-group-item flex-fill w-25" title="{{$order['address']}}">{{$order['address']}}</li>
                <li class="list-group-item flex-fill w-25">
                    <form action="/admin-panel/orders/submit" method="post" class="d-flex justify-content-between w-100">
                        @csrf
                        <button class="btn-success btn">Принять</button>
                        <button class="btn-danger btn">Отклонить</button>
                    </form>
                </li>
            </ul>
        @endforeach
    </div>
</div>
