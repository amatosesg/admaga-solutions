@extends('layouts.app')

@section('page-description', 'Mis servicios contratados')

@section('title', 'Servicios - ADMAGA Solutions')

@section('first-container', 'container')

@section('content')
    <div class="py-3 text-center">
        <h1>Mis servicios</h1>
    </div>
    <hr>

    @empty ($services)
        <div class="alert alert-warning">
            Aún no se ha contratado ningún servicio
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Id Orden</th>   
                        <th>Fecha Ult. Modificación</th>
                        <th>Id Servicio</th>
                        <th>Servicio</th>
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
                        <td>{{ $service['order_id'] }}</td>
                        <td>{{ $service['updated_at'] }}</td>
                        <td>{{ $service['service_id'] }}</td>
                        <td>{{ $service['service_name'] }}</td>
                        <td>{{ $service['status'] }}</td>
                        <td>
                            @if($service['status'] == 'paid')
                                <a class="btn btn-link" href="{{ route('profiles.configure.services', ['os' => $service['order_id'] . '-' . $service['service_id']]) }}">
                                    Configurar
                                </a>
                            @else
                                <a class="btn btn-link" href="" target="_blank">
                                    Ver
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty
@endsection