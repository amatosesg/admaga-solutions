@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel del Administrador</div>

                <div class="card-body">
                    <div class="row row-cols-3 g-3">
                        <div class="col align-items-center">
                            <div class="card h-100">
                                <a href="{{ route('services.index') }}" class="card-body text-center text-decoration-none" >
                                    <h5 class="card-title">Administrar Servicios</h5>
                                    <p class="card-text text-muted">Crear/Modificar servicios en venta</p>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <a href="{{ route('users.index') }}" class="card-body text-center text-decoration-none" >
                                    <h5 class="card-title">Administrar Usuarios</h5>
                                    <p class="card-text text-muted">Administrar los usuarios de la aplicación</p>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <a href="{{ route('services.active') }}" class="card-body text-center text-decoration-none" >
                                    <h5 class="card-title">Servicios en Activo</h5>
                                    <p class="card-text text-muted">Consultar y administrar los servicios activos de usuarios</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
