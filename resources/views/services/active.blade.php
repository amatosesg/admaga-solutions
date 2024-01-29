@extends('layouts.app')

@section('page-description', 'Listado de todos los servicios en activo por nuestros clientes')

@section('title', 'Servicios - ADMAGA Solutions')

@section('first-container', 'container')

@section('content')
    <div class="py-3 text-center">
        <h1>Lista de Servicios en Activo</h1>
    </div>
    <hr>

    @empty ($services)
        <div class="alert alert-warning">
            Actualmente no hay servicios en activo por ningún cliente
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Id Servicio</th>   
                        <th>Cantidad</th>
                        <th>Cliente (Id)</th>
                        <th>Id Orden</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $service_count = 1;   
                    @endphp
                    @foreach ($services as $service)
                    <tr>
                        <td>{{ $service_count++ }}</td>
                        <td>{{ $service['service_id'] }}</td>
                        <td>{{ $service['quantity'] }}</td>
                        <td>{{ $service['customer_name'] . ' (' . $service['customer_id'] . ')' }}</td>
                        <td>{{ $service['order_id'] }}</td>
                        <td>{{ $service['status'] }}</td>
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