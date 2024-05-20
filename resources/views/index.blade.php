@extends('layouts.app')

@section('content')
<main class="pt-5">
    <section class="hero bg-dark text-white py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h1 class="mb-3">Продавай и покупай с Orders</h1>
                    <p class="lead mb-4">Быстрые, безопасные и надежные объявления о продаже товаров.</p>
                    <div class="d-flex justify-content-center gap-4">
                        <a href="#formCreateOrders" class="btn btn-success w-25">Сделать заказ</a>
                        <a href="#formBecomeSupplier" class="btn btn-success w-25">Стать поставщиком</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-ads py-5">
        <div class="container">
            <div id="formCreateOrders" style="min-height: 400px">
                <h1>Сделайте заказ</h1>
                @include('forms.makeOrder')
            </div>
            <div id="formBecomeSupplier" style="min-height: 400px">
                <h1>Стать поставщиком</h1>
                <form action="">
                </form>
            </div>
        </div>
    </section>
</main>
@endsection
