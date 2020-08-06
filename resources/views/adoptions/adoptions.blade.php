@extends('master')
@section('tittle', 'Adopcion')
@section('style')
<link href="/static/css/bootstrapAdopta.css" rel="stylesheet">
@section('contenido')
 <!--Foto-->
 <section id="foto">
    <img src="/static/imagenes/AdoptaSeccion.png" alt="" class="w-100">
  </section>
  <!--Catalogo-->
<section id="about">
  <div class="container" data-aos="fade-up">
      <header class="section-header">
          <h2>RESCATADOS EN ADOPCIÓN</h2>
      </header>
      <div class="row pt-5">
          <div class="col-md-6">
              <div class="categoria">
                  <span>VER: </span>
                  <a href="{{url('/adoptions/all')}}">Todos</a>
                  <a href="{{url('/adoptions/macho')}}">Machos</a>
                  <a href="{{url('/adoptions/hembra')}}">Hembras</a>
                  <a href="{{url('/adoptions/pet')}}">Cachorros</a>
              </div>
          </div>
          <div class="col-md-6">
              @include('adoptions.search')
          </div>
      </div>
      <hr>
      @include('adoptions.post')
  <!--Paginacion-->
   


@endsection