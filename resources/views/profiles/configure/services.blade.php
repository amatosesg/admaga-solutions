@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Configurar Servicio') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('enterprise.store', ['o' => $order_id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre de la Empresa') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="colors" class="col-md-4 col-form-label text-md-end">{{ __('Colores de la Empresa') }}</label>
                            <div class="col-md-2">
                                <div class="color-box" id="color1-box"></div>
                                <input type="color" id="color1" name="color1">
                            </div>
                            <div class="col-md-2">
                                <div class="color-box" id="color2-box"></div>
                                <input type="color" id="color2" name="color2">
                            </div>
                            <div class="col-md-2">
                                <div class="color-box" id="color3-box"></div>
                                <input type="color" id="color3" name="color3">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bbdd_name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre de la BBDD') }}</label>

                            <div class="col-md-6">
                                <input id="bbdd_name" type="text" class="form-control" name="bbdd_name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="url_name" class="col-md-4 col-form-label text-md-end">{{ __('URL de la Web') }}</label>

                            <div class="col-md-6">
                                <input id="url_name" type="text" class="form-control" name="url_name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Logotipo') }}</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input class="custom-file-input" type="file" accept="image/*" name="image" >
                                </div>
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar Cambios') }}
                                </button>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <small><strong>¡Importante!</strong> Al guardar cambios estará creando su empresa con la configuración seleccionada y su base de datos correspondientes. Este proceso puede tardar unos minutos.</small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
