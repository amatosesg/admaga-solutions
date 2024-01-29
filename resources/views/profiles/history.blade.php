@extends('layouts.app')

@section('page-description', 'Historial de Compras')

@section('title', 'Historial - ADMAGA Solutions')

@section('first-container', 'container')

@section('content')
    <div class="py-3 text-center">
        <h1>Historial de Compras</h1>
    </div>
    <hr>

    @empty ($orders)
        <div class="alert alert-warning">
            Aún no se han realizado compras
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Id Orden</th>   
                        <th>Fecha</th>
                        <th>Nº de Servicios</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $order_count = 1;   
                    @endphp
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order_count++ }}</td>
                        <td>{{ $order['order_id'] }}</td>
                        <td>{{ $order['created_at'] }}</td>
                        <td>{{ $order['num_services'] }}</td>
                        <td>{{ $order['total'] }} €</td>
                        <td>{{ $order['status'] }}</td>
                        <td>
                            <a class="btn btn-link" href="">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty
@endsection