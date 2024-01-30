@extends('layouts.app')

@section('page-description', "Mas información sobre la empresa $enterprise->name")

@section('title', "$enterprise->name - ADMAGA Solutions")

@section('first-container', 'container')

@section('content')
    <div class="py-3 text-center">
        <h1>Información de la Empresa</h1>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Datos principales de la empresa: ' . $enterprise->name ) }}</div>

                <div class="card-body mx-5">
                    <div class="row mb-3">
                        <label for="name">Nombre de la Empresa</label>
                        <input class="form-control" type="text" name="name" value="{{ $enterprise->name }}" readonly>
                    </div>
                    <div class="row mb-3">
                        <label for="bbdd-name">Nombre de la Base de Datos</label>
                        <input class="form-control" type="text" name="bbdd-name" value="{{ $enterprise->bbdd_name }}" readonly>
                    </div>
                    <div class="row mb-3">
                        <label for="bbdd-status">Estado de la Base de Datos</label>
                        <input class="form-control" type="text" name="bbdd-status" value="{{ $enterprise->bbdd_status == 1 ? 'Configurada' : 'Pendiente' }}" readonly>
                    </div>
                    <div class="row mb-3">
                        <label for="url-name">Nombre de la URL</label>
                        <input type="text" class="form-control" name="url-name" value="{{ $enterprise->url_name }}" readonly>
                    </div>
                    <div class="row mb-3">
                        <label for="url-status">Estado de la URL</label>
                        <input type="text" class="form-control" name="url-status" value="{{ $enterprise->url_status == 1 ? 'Configurada' : 'Pendiente' }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection