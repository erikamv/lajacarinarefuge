@extends('master')
@section('tittle', 'Tienda virtual')
@section('style')
<link href="/static/css/bootstrapTienda.css" rel="stylesheet">
@section('contenido')

<!--Foto-->
<section id="foto">
    <img src="/static/imagenes/Tienda2.png" alt="" class="w-100">
  </section>

  
  <!--Bienvenida-->
  <section id="about">
    <div class="container">
        <header class="section-header">
          <h2>TIENDA JACARINA</h2>
        </header>
      
      <div class="row about-cols">
        <div class="col-md-3">
          <div class="about-col">
            <div class="filtrado">
              <h5>FILTRAR POR</h5>
              <div class="categorias">
                <li class="parent "><a data-toggle="collapse" href="#sub-item-1"> <b>Categorías</b> 
                  <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right">
                  <em class="fa fa-plus"></em></span>
                  </a>
                  <ul class="children collapse" id="sub-item-1">
                    @foreach($categoria as $cat)
                    <li><a class="" href="{{url('/products/'.$cat->idcategoria)}}">{{$cat->nombre}}</a></li>
                    @endforeach
                  </ul>
                </li>
              </div>   
              <!--div class="categorias">
                <li class="parent "><a data-toggle="collapse" href="#sub-item-2"> <b>Precio</b> 
                  <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right">
                  <em class="fa fa-plus"></em></span>
                  </a>
                  <ul class="children collapse" id="sub-item-2">
                    <li><a class="" href="#">$1.00 - $5.00 </a></li>
                    <li><a class="" href="#">$6.00 - $10.00</a></li>
                    <li><a class="" href="#">$11.00 - $15.00</a></li>
                    <li><a class="" href="#">$15.00 - Adelante</a></li>
                  </ul>
                </li>
              </div-->   
            </div>
          </div>
          <div class="about-col">
            <div class="filtrado">
              <h5>BUSCAR</h5>         
            </div>
          </div>
        </div>
        @foreach($articulos as $art)
      
        
        <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
          <div class="about-col">
            <div class="zoom">
              <div class="img">
              <a href="{{url('/products/'.$art->idcategoria.'/'.$art->idarticulo)}}">
                <img src="{{url('/static/imagenes/articulos/'.$art->imagen)}}" alt="" class="img-fluid">
              </a> 
              </div>
              <div class="info-producto">
                <a href=""><p>{{$art->nombre}}</p></a>
                <p style="text-align: center;"><b>$ {{$art->precio}}</b></p>
              </div>
            </div>
        </div>
      </div>
      
      @endforeach
    </div>
    {{$articulos->render()}}
  </section><!-- Final Bienvenida Sección -->

@endsection