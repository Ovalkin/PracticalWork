<form method="post" action="/orders/make">
    @csrf
    <div class="mb-3">
        <label for="productName" class="form-label">Название продукта</label>
        <input type="text" class="form-control" id="productName" name="product_name">
    </div>
    <div class="mb-3">
        <label for="productQuantity" class="form-label">Количество</label>
        <input type="text" class="form-control" id="productQuantity" name="quantity">
    </div>
    <div class="mb-3">
        <label for="orderAddress" class="form-label">Адрес</label>
        <input type="text" class="form-control" id="orderAddress" name="address">
    </div>
    <button type="submit" class="btn btn-success w-100">Сделать заказ</button>
</form>
