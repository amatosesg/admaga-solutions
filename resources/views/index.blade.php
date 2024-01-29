@extends('layouts.app')

@section('page-description', 'Generador de páginas web corporativas con intranet enfocada para su uso por parte de autónomos o pequeñas empresas')

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
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
      <div class="container">
        <div class="carousel-caption text-start">
          <h1>1 Parte Carrousel</h1>
          <p class="opacity-75">Conoce nuestros servicios</p>
          <p><a class="btn btn-lg btn-primary" href="{{ route('pricing.index') }}">Servicios</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
      <div class="container">
        <div class="carousel-caption">
          <h1>2 Parte Carrousel</h1>
          <p>Regístrate para obtener un descuento</p>
          <p><a class="btn btn-lg btn-primary" href="{{ route('register') }}">Regístrate</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
      <div class="container">
        <div class="carousel-caption text-end">
          <h1>3 Parte Carrousel</h1>
          <p>Algo mas importante a añadir</p>
          <p><a class="btn btn-lg btn-primary" href="#">Ir</a></p>
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
      <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
      <h2 class="fw-normal">Header 1</h2>
      <p>Servicio Rápido</p>
    </div>
    <div class="col-lg-4">
      <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
      <h2 class="fw-normal">Header 2</h2>
      <p>Servicio Seguro</p>
    </div>
    <div class="col-lg-4">
      <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
      <h2 class="fw-normal">Header 3</h2>
      <p>Único en el mercado</p>
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
