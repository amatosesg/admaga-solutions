@extends('layouts.app')

@section('first-container', 'container')

@section('content')
    <div class="py-3 text-center">
        <h1>Realizar Pedido</h1>
    </div>
    <hr>
    <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <form method="POST" action="{{ route('orders.store') }}" class="needs-validation">
                @csrf
                <h4 class="text-primary">Pago</h4>
                <div class="my-3">
                    <span class="fw-bold">Método de Pago</span>
                    <div class="form-check mt-2">
                        <input id="credit" type="radio" class="form-check-input" name="payment-method" value="credit" checked required>
                        <label for="credit" class="form-check-label">Tarjeta de Crédito</label>
                    </div>
                    <div class="form-check">
                        <input id="debit" type="radio" class="form-check-input" name="payment-method" value="debit" required>
                        <label for="debit" class="form-check-label">Tarjeta de Débito</label>
                    </div>
                    <div class="form-check">
                        <input id="paypal" type="radio" class="form-check-input" name="payment-method" value="paypal" required>
                        <label for="paypal" class="form-check-label">PayPal</label>
                    </div>
                </div>
                <hr>
                <button type="submit" class="w-100 btn btn-primary btn-lg">Proceder con el Pago</button>
            </form>
        </div>
        <div class="col-md-7 col-lg-8">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Carrito</span>
                @inject('cartService', 'App\Services\CartService')
                <span class="badge bg-primary rounded-pill">{{ $cartService->countProducts() }}</span>
            </h4>
            <table class="table table-striped">
                <thead>
                    <th class="text-center">#</th>
                    <th class="text-start">Servicio</th>
                    <th class="text-end">Precio</th>
                    <th class="text-end">Cantidad</th>
                    <th class="text-end">Subtotal</th>
                </thead>
                <tbody>
                    @foreach ($cart->services as $service)
                        <tr>
                            <td class="text-center">{{ $cart_quantity++ }}</td>
                            <td class="text-start">{{ $service->title }}</td>
                            <td class="text-end">{{ $service->price }}</td>
                            <td class="text-end">{{ $service->pivot->quantity }}</td>
                            <td class="text-end">{{ $service->total }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="text-center fw-bold">TOTAL</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-end fw-bold">{{ $cart->total }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Código Promocional">
                    <button type="submit" class="btn btn-secondary">Aplicar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
