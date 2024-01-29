@extends('layouts.app')

@section('first-container', 'container')

@section('content')
    <div class="py-3 text-center">
        <h1>Carrito</h1>
    </div>
    <hr>
    @if (!isset($cart) || $cart->services->isEmpty())
        <div class="alert alert-warning">
            No has añadido servicios todavía
        </div>
    @else
        <a class="btn btn-success mb-3" href="{{ route('orders.create') }}">Ir a Pagar</a>
        <div class="row">
            <div class="col-sm-12 bg-light">
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Servicio</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($cart->services as $service)
                            <tr>
                                <td>{{ $cart_quantity++  }}</td>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->price }}</td>
                                <td>{{ $service->pivot->quantity }}</td>
                                <td>{{ $service->total }}</td>
                                <td>
                                    <form action="{{ route('services.carts.destroy', ['cart' => $cart->id, 'service' => $service->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link btn-sm text-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="fw-bold">TOTAL</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="fw-bold">{{ $cart->total }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection