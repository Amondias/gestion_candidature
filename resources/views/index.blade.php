@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')

<style>
  .carousel,
  .carousel-inner,
  .carousel-item,
  .carousel-item img {
      height: 100vh;
      width: 100%;
      object-fit: cover;
  }

  .overlay-buttons {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
  }

  .overlay-buttons a {
      margin: 10px;
      padding: 15px 30px;
      font-size: 1.2rem;
  }
</style>

<div id="imageSlider" class="carousel slide position-relative" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('slider/slide1.jpg') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('slider/slide2.avif') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('slider/slide3.jpg') }}" class="d-block w-100" alt="...">
        </div>
    </div>

    <!-- Boutons centrés sur l’image -->
    <div class="overlay-buttons">
        <h1 class="text-white mb-4">Bienvenue sur Job_Seek</h1>
        <a href="{{route('demande.create')}}" class="btn btn-primary">Accéder en tant que Demandeur</a>
        <a href="{{route('offre.create')}}" class="btn btn-success">Accéder en tant qu'Offreur</a>
    </div>
</div>

@endsection
