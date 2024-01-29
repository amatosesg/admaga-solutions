<div class="card mb-4 rounded-3 shadow-sm">
    <div class="card-header py-3 {{ $service->important ? 'text-bg-primary border-primary' : '' }}">
        <h4 class="my-0 fw-normal">{{ $service->title }}</h4>
    </div>
    <div class="card-body">
        <h1 class="card-title pricing-card-title">
            {{ $service->price }}€
            <small class="text-muted fw-light">/mes</small>
        </h1>
        <ul class="list-unstyled mt-3 mb-4">
            <li>Ventaja 1</li>
            <li>Ventaja 2</li>
            <li>&nbsp;</li>
            <li>&nbsp;</li>
        </ul>
        <form class="d-inline" method="POST" action="{{ route('services.carts.store', ['service' => $service->id ]) }}">
            @csrf
            <button type="submit" class="w-100 btn btn-lg {{ $service->important ? 'btn-primary' : 'btn-outline-primary' }}">Empezar</button>
        </form>
    </div>
</div>