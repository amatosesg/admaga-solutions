@extends('layouts.app')

@section('first-container', 'container')

@section('content')
    <div class="py-3 text-center">
        <h1>Confirmar Pago</h1>
    </div>
    <hr>
    <div>
        <form method="POST" action="{{ route('orders.payments.store', ['order' => $order->id, 'payment' => $payment]) }}">
            @csrf
            <div class="d-flex justify-content-center">
                <div class="card col-md-6 col-12 box2">
                    <div class="card-content">
                        <div class="card-header box2-head">
                            <div class="heading2"> Detalles del Pago </div>
                        </div>
                        <div class="card-body col-10 offset-1">
                            <div class="form-group py-2">
                                <label for="payment-method" class="form-label fw-bold">Método de pago seleccionado</label>
                                @php
                                    switch($payment){
                                        case 'credit':
                                            $paymentName = 'Tarjeta de Crédito';
                                            break;
                                        case 'debit':
                                            $paymentName = 'Tarjeta de Débito';
                                            break;
                                        case 'paypal':
                                            $paymentName = 'Paypal';
                                            break;
                                        default:
                                            $paymentName = 'Tarjeta de Crédito';
                                            break;
                                    }   
                                @endphp
                                <input id="payment-method" type="text" class="form-control" value="{{ $paymentName }}" required readonly>
                            </div>
                            <div class="form-group py-2">
                                    <label for="cc-name" class="form-label fw-bold">Nombre</label>
                                    <input id="cc-name" type="text" class="form-control" name="cc-name" required>
                                    <small class="text-body-secondary">Nombre completo como esta indicado en la tarjeta</small>
                                </div>
                                <div class="form-group py-2"> 
                                    <label for="cc-number" class="form-label fw-bold">Número de tarjeta</label>
                                    <input id="cc-number" type="text" class="form-control" name="cc-number" placeholder="XXXX-XXXX-XXXX-XXXX" required>
                                </div>
                                <div class="form-group py-2">
                                    <div class="d-flex row">
                                        <div class="col-8">
                                            <label for="cc-expiration" class="form-label fw-bold">Fecha Vencimiento</label>
                                            <div class="d-flex" style="column-gap: 10px;">
                                                <select class="form-control" name="cc-expiration-month">
                                                    <option value="1">Enero</option>
                                                    <option value="2">Febrero</option>
                                                    <option value="3">Marzo</option>
                                                    <option value="4">Abril</option>
                                                    <option value="5">Mayo</option>
                                                    <option value="6">Junio</option>
                                                    <option value="7">Julio</option>
                                                    <option value="8">Agosto</option>
                                                    <option value="9">Septiembre</option>
                                                    <option value="10">Octubre</option>
                                                    <option value="11">Noviembre</option>
                                                    <option value="12">Diciembre</option>
                                                </select> 
                                                <select class="form-control" name="cc-expiration-year">
                                                    @php
                                                        $year = date("Y");   
                                                    @endphp
                                                    @for($i = 0; $i <= 10; $i++)
                                                        <option>{{ $year }}</option>
                                                        @php
                                                            $year++;   
                                                        @endphp
                                                    @endfor
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="cc-cvv" class="form-label fw-bold">CVV</label>
                                            <input id="cc-cvv" type="text" class="form-control text-left" name="cc-cvv" placeholder="XXX" required>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <hr>
                        <div class="card-footer col-10 offset-1 border-0">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <p><strong>TOTAL</strong></p>
                                <p><strong>{{ $order->total }} €</strong></p>
                            </div> <button class="btn btn-primary col-12"> Pagar </button>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>
    </div>
@endsection
