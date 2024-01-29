@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel del Usuario</div>

                <div class="card-body">
                    <div class="row row-cols-3 g-3">
                        <div class="col align-items-center">
                            <div class="card h-100">
                                <a href="{{ route('profiles.edit') }}" class="card-body text-center text-decoration-none" >
                                    <h5 class="card-title">Mi Perfil</h5>
                                    <p class="card-text text-muted">Configuración del perfil del usuario</p>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <a href="{{ route('profiles.services') }}" class="card-body text-center text-decoration-none" >
                                    <h5 class="card-title">Mis Servicios</h5>
                                    <p class="card-text text-muted">Consultar el estado y configurar mis servicios</p>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <a href="{{ route('profiles.history') }}" class="card-body text-center text-decoration-none" >
                                    <h5 class="card-title">Historial de Compras</h5>
                                    <p class="card-text text-muted">Ver las compras realizadas, estado de pago, solicitar facturas...</p>
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
