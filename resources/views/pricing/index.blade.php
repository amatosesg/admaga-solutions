@extends('layouts.app')

@section('page-description', "Conoce los servicios disponibles de ADMAGA Solutions")

@section('title', "Servicios - ADMAGA Solutions")

@section('first-container', 'container-lg')

@section('content')
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check" viewBox="0 0 16 16">
            <title>Check</title>
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
        </symbol>
    </svg>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Tarifas</h1>
        <p class="fs-5 text-muted">Todos nuestros servicios son personalizados en cada paso del camino para apoyar el crecimiento de tu empresa. La transparencia es importante para nosotros, así que, siempre sabrás por lo que estás pagando.</p>
    </div>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        @foreach($services as $service)
            <div class="col">
                @include('components.service-card')
            </div>
        @endforeach
    </div>
    <div class="container">
        <h2 class="display-6 text-center mb-4">
            Comparador de planes
        </h2>
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <th style="width: 34%"></th>
                    @foreach($services as $service)
                        <th style="width: 22%">{{ $service->title }}</th>
                    @endforeach
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-start">Base de Datos</th>
                        <td>
                            <svg class="bi" width="24" height="24">
                                <use xlink:href="#check"></use>
                            </svg>
                        </td>
                        <td>
                            <p>Modificable</p>
                        </td>
                        <td>
                            <p>Personalizada</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Web</th>
                        <td>
                            <p>Fija</p>
                        </td>
                        <td>
                           <p>Dinámica</p>
                        </td>
                        <td>
                            <p>Dinámica Personalizada</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Intranet</th>
                        <td>
                            <svg class="bi" width="24" height="24">
                                <use xlink:href="#check"></use>
                            </svg>
                        </td>
                        <td>
                            <p>Premium</p>
                        </td>
                        <td>
                            <p>Premium + 1 Aplicación Personalizada</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Usuarios</th>
                        <td>
                            <p>1</p>
                        </td>
                        <td>
                            <p>1-10</p>
                        </td>
                        <td>
                            <p>Ilimitados</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection