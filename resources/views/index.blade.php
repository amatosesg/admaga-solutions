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
      <h2 class="featurette-heading fw-normal lh-1">Diseñado para autónomos y pequeñas empresas</h2>
      <p class="lead">Nuestro sistema esta desarrollado desde el inicio enfocado y pensando en aquellas personas que inician una aventura económica y cuentan con poca gente en su equipo. ¿Cumples esos requisitos? ¡Nuestros servicios son para ti!</p>
    </div>
    <div class="col-md-5">
      <img src="{{ asset('images/information-img-1.jpg') }}" alt="Imagen Information 1" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="300" height="300">
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7 order-md-2">
      <h2 class="featurette-heading fw-normal lh-1">Servicio Estable y funcionando en menos de 24h</h2>
      <p class="lead">Obtén hoy tu servicio con nosotros y empieza a tener una mejor imagen y una mejor gestión de tu empresa junto a nosotros. En menos de 24 horas dispondrás de una base de datos y servicio hosting totalmente funcional, con acceso a una intranet creada especialmente para ti. Regístra a tus empleados, ponles horarios, etc.. ¡Si algo que necesitas no se encuentra ahí, dinoslo y lo crearemos para ti!</p>
    </div>
    <div class="col-md-5 order-md-1">
      <img src="{{ asset('images/information-img-2.jpg') }}" alt="Imagen Information 1" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="300" height="300">
    </div>
  </div>
  <hr class="featurette-divider">

</div>

<footer class="container">
  <p class="float-end link-info"><a href="#">Volver arriba</a></p>
  <p>&copy; 2024 ADMAGA Solutions</p>
</footer>
@endsection
