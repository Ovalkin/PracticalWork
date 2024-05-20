<form action="/supplier-panel/orders/submit" method="post" class="d-flex justify-content-between w-100">
    @csrf
    <input type="hidden" name="idOrder" value="{{$order['id']}}">
    <button type="submit" name="action" value="accept" class="btn-success btn">Принять</button>
</form>
