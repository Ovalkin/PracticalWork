<form action="/supplier-panel/orders/submit" method="post" class="w-100">
    @csrf
    <input type="hidden" name="idOrder" value="{{$order['id']}}">
    <button type="submit" name="action" value="accept" class="btn-success btn w-100">Принять</button>
</form>
