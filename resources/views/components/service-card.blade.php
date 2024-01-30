<div class="card mb-4 rounded-3 shadow-sm">
    {{-- <div class="card-header py-3 {{ $service->important ? 'text-bg-primary border-primary' : '' }}"> --}}
    <div class="card-header py-3 {{ $service->id == 2 ? 'text-bg-dark border-dark' : '' }}">
        <h4 class="my-0 fw-normal">{{ $service->title }}</h4>
    </div>
    <div class="card-body">
        <h1 class="card-title pricing-card-title">
            {{ $service->price }}€
            <small class="text-muted fw-light">/mes</small>
        </h1>
        @switch($service->id)
                    @case(1)
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Base de datos</li>
                            <li>Web Fija</li>
                            <li>Intranet</li>
                            <li>1 Usuario</li>
                        </ul>
                        @break
                    @case(2)
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Base de datos modificable</li>
                            <li>Web Dinámica</li>
                            <li>Intranet Premium</li>
                            <li>1 a 10 Usuarios</li>
                        </ul>
                        @break
                    @case(3)
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Base de datos personalizada</li>
                            <li>Web Dinámica personalizada</li>
                            <li>Intranet Premium + 1 aplicación gratuita</li>
                            <li>Usuarios ilimitados</li>
                        </ul>
                        @break
                    @default
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Ventaja 1</li>
                            <li>Ventaja 2</li>
                            <li>Ventaja 3</li>
                            <li>Ventaja 4</li>
                        </ul>
                        @break
                @endswitch
        <form class="d-inline" method="POST" action="{{ route('services.carts.store', ['service' => $service->id ]) }}">
            @csrf
            {{-- <button type="submit" class="w-100 btn btn-lg {{ $service->important ? 'btn-primary' : 'btn-outline-primary' }}">Empezar</button> --}}
            <button type="submit" class="w-100 btn btn-lg {{ $service->id == 2 ? 'btn-dark' : 'btn-outline-secondary' }}">
                @switch($service->id)
                    @case(1)
                        Empezar
                        @break
                    @case(2)
                        Recomendado
                        @break
                    @case(3)
                        Mejor
                        @break
                    @default
                        Comprar
                        @break
                @endswitch
            </button>
        </form>
    </div>
</div>