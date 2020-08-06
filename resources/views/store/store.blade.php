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
                    <li><a class="" href="#">Accesorios </a></li>
                    <li><a class="" href="#">Comida</a></li>
                    <li><a class="" href="#">Juguetes</a></li>
                    <li><a class="" href="#">Ropa</a></li>
                    <li><a class="" href="#">Estética e Higiene</a></li>
                  </ul>
                </li>
              </div>   
              <div class="categorias">
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
              </div>   
            </div>
          </div>
          <div class="about-col">
            <div class="filtrado">
              <h5>BUSCAR</h5>
              <input class="buscar-catal" type="search" id="buscar" nombre="buscar" placeholder="Buscar en catálogo">               
            </div>
          </div>
        </div>
        <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
          <div class="about-col">
            <div class="zoom">
              <div class="img">
                <a href=""><img src="imagenes/hueso.jpg" alt="" class="img-fluid"></a> 
              </div>
              <div class="info-producto">
                <a href=""><p>Hueso Prensado con Piel de Vacuno</p></a>
                <p style="text-align: center;"><b>$5.00</b></p>
              </div>
            </div>
        </div>
      </div>
      <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
        <div class="about-col">
          <div class="zoom">
            <div class="img">
              <a href=""><img src="imagenes/collar.jpg" alt="" class="img-fluid"></a> 
            </div>
            <div class="info-producto">
              <a href=""><p>Hueso Prensado con Piel de Vacuno</p></a>
              <p style="text-align: center;"><b>$5.00</b></p>
            </div>
          </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
      <div class="about-col">
        <div class="zoom">
          <div class="img">
            <a href=""><img src="imagenes/palcas-hueso.png" alt="" class="img-fluid"></a> 
          </div>
          <div class="info-producto">
            <a href=""><p>Hueso Prensado con Piel de Vacuno</p></a>
            <p style="text-align: center;"><b>$5.00</b></p>
          </div>
        </div>
    </div>
  </div>
    </div>
  </section><!-- Final Bienvenida Sección -->

  <!--Paginacion-->
  <section class="paginas pt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="paginacion">
          <ul>
            <li><a href="#" class="active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">Siguiente</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!--Final Paginacion-->
@endsection