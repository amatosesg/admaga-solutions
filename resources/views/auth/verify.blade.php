@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu dirección de email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un link de verificación a tu dirección de email') }}
                        </div>
                    @endif

                    {{ __('Antes de realizar un pedido, por favor comprueba tu correo electrónico para verificar tu cuenta.') }}
                    {{ __('Si no has recibido ningún correo de verificación') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('haz click aquí para solicitar el envío de uno nuevo') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
