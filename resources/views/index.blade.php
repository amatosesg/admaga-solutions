@extends('layouts.app')

@section('page-description', 'Generador de páginas web corporativas con intranet enfocada para su uso por parte de autónomos o pequeñas empresas')

@section('preload')
  <link rel="preload" href="{{ asset('images/carousel-img-1.jpg') }}" as="image">
  <link rel="preload" href="{{ asset('images/carousel-img-2.jpg') }}" as="image">
  <link rel="preload" href="{{ asset('images/carousel-img-3.jpg') }}" as="image">
  <link rel="preload" href="{{ asset('images/circle-img-1.jpg') }}" as="image">
  <link rel="preload" href="{{ asset('images/circle-img-2.jpg') }}" as="image">
  <link rel="preload" href="{{ asset('images/circle-img-3.jpg') }}" as="image">
@endsection

@section('first-container', '')

@section('content')
<div id="mainCarousel" class="carousel slide mb-6" height="500px" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/carousel-img-1.jpg') }}" alt="Imagen 1" class="d-block w-100" style="max-height: 400px; object-fit: cover; ">
      <div class="container">
        <div class="carousel-caption text-start">
          <h1>¡Regístrate!</h1>
          <p class="opacity-75">Regístrate para obtener un descuento y empezar tu servicio con nosotros hoy mismo</p>
          <p><a class="btn btn-lg btn-dark" href="{{ route('register') }}">Registrarse</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/carousel-img-2.jpg') }}" alt="Imagen 2" class="d-block w-100" style="max-height: 400px; object-fit: cover;">
      <div class="container">
        <div class="carousel-caption">
          <h1>¿Tienes dudas?</h1>
          <p class="opacity-75">Contacta con alguno de nuestros especialistas y te asesorarán en lo que necesites</p>
          <p><a class="btn btn-lg btn-dark" href="#">Contactar</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/carousel-img-3.jpg') }}" alt="Imagen 3" class="d-block w-100" style="max-height: 400px; object-fit: cover;">
      <div class="container">
        <div class="carousel-caption text-end">
          <h1>No solo Hosting</h1>
          <p class="opacity-75">Conoce todos nuestros servicios, especialmente diseñados para cubrir tus necesidades</p>
          <p><a class="btn btn-lg btn-dark" href="{{ route('pricing.index') }}">Servicios y Tarifas</a></p>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="container marketing mt-3 text-center">
  <div class="row">
    <div class="col-lg-4">
      <img src="{{ asset('images/circle-img-1.jpg') }}" alt="Imagen Circle 1" class="bd-placeholder-img rounded-circle" width="140" height="140">
      <h2 class="fw-normal">Seguro</h2>
      <p>Seguridad ante cualquier ataque</p>
    </div>
    <div class="col-lg-4">
      <img src="{{ asset('images/circle-img-2.jpg') }}" alt="Imagen Circle 2" class="bd-placeholder-img rounded-circle" width="140" height="140">
      <h2 class="fw-normal">Personalizado</h2>
      <p>Totalmente configurado a tu medida</p>
    </div>
    <div class="col-lg-4">
      <img src="{{ asset('images/circle-img-3.jpg') }}" alt="Imagen Circle 3" class="bd-placeholder-img rounded-circle" width="140" height="140">
      <h2 class="fw-normal">Rápido</h2>
      <p>El mejor bando de ancha para tu web</p>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading fw-normal lh-1">Primera ventaja de nuestro servicio <span class="text-body-secondary">A destacar</span></h2>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur enim quam, placerat non porttitor non, suscipit vel ipsum. Aliquam nec elit nibh. Sed vehicula sit amet nisl a bibendum. Nulla varius purus id felis tincidunt, vel hendrerit quam pretium. Aliquam egestas, odio quis porta fringilla, ante lacus vulputate dui, non laoreet dolor velit ut elit. Donec vehicula libero eu nibh scelerisque rutrum. Nullam id lacinia felis. Integer maximus eros id molestie blandit. Nunc aliquet consectetur vulputate. Quisque sollicitudin egestas ex non eleifend. Phasellus eu enim nec ante luctus fringilla. Nullam sapien dolor, suscipit fermentum massa vel, viverra tempus sem.</p>
    </div>
    <div class="col-md-5">
      <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">Placeholder Imagen 500x500</text></svg>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7 order-md-2">
      <h2 class="featurette-heading fw-normal lh-1">Algo mas a mostrar <span class="text-body-secondary">Importante</span></h2>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur enim quam, placerat non porttitor non, suscipit vel ipsum. Aliquam nec elit nibh. Sed vehicula sit amet nisl a bibendum. Nulla varius purus id felis tincidunt, vel hendrerit quam pretium. Aliquam egestas, odio quis porta fringilla, ante lacus vulputate dui, non laoreet dolor velit ut elit. Donec vehicula libero eu nibh scelerisque rutrum. Nullam id lacinia felis. Integer maximus eros id molestie blandit. Nunc aliquet consectetur vulputate. Quisque sollicitudin egestas ex non eleifend. Phasellus eu enim nec ante luctus fringilla. Nullam sapien dolor, suscipit fermentum massa vel, viverra tempus sem.</p>
    </div>
    <div class="col-md-5 order-md-1">
      <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">Placeholder Imagen 500x500</text></svg>
    </div>
  </div>

  {{-- <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading fw-normal lh-1">Más cosas a destacar <span class="text-body-secondary">Importante</span></h2>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur enim quam, placerat non porttitor non, suscipit vel ipsum. Aliquam nec elit nibh. Sed vehicula sit amet nisl a bibendum. Nulla varius purus id felis tincidunt, vel hendrerit quam pretium. Aliquam egestas, odio quis porta fringilla, ante lacus vulputate dui, non laoreet dolor velit ut elit. Donec vehicula libero eu nibh scelerisque rutrum. Nullam id lacinia felis. Integer maximus eros id molestie blandit. Nunc aliquet consectetur vulputate. Quisque sollicitudin egestas ex non eleifend. Phasellus eu enim nec ante luctus fringilla. Nullam sapien dolor, suscipit fermentum massa vel, viverra tempus sem.</p>
    </div>
    <div class="col-md-5">
      <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text></svg>
    </div>
  </div>
  --}}
  <hr class="featurette-divider">

</div>

<footer class="container">
  <p class="float-end link-info"><a href="#">Volver arriba</a></p>
  <p>&copy; 2024 ADMAGA Solutions</p>
</footer>
@endsection
