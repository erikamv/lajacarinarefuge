@extends('master')
@section('tittle', 'La Jacarina')
@section('style')
<link href="{{asset('/static/css/bootstrapInicio.css')}}" rel="stylesheet">
@section('contenido')

<!--Carrusel-->

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="/static/imagenes/Adopta.png" alt="First slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
 
<!--Bienvenida-->
<section id="about">
  <div class="container" data-aos="fade-up">
    <header class="section-header">
      <h2>BIENVENIDO A NUESTRO REFUGIO</h2>
    </header>
    <div class="row about-cols">
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="about-col">
          <div class="img">
            <img src="/static/imagenes/refugio1.jpg" alt="" class="img-fluid">
            <div class="icon"><i class="fas fa-dog"></i></div>
          </div>
          <h2 class="title"><a href="#">Refugio</a></h2>
          <p>
            Llegan con duras vivencias y asustados, pero con paciencia y amor conseguimos ayudarles. En nuestra 
            protectora, les damos un hogar donde pueden recuperarse y prepararse para encontrar a su familia definitiva.
          </p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="about-col">
          <div class="img">
            <img src="/static/imagenes/refugio2.jpg" alt="" class="img-fluid">
            <div class="icon"><i class="fas fa-paw"></i></div>
          </div>
          <h2 class="title"><a href="{{url('/adoptions')}}">¡Adopta!</a></h2>
          <p>
            Los animales no se compran se adoptan. Son la mejor compañía, un miembro más de la familia que te amará incondicionalmente. 
            Muchos perros esperan llenar de felicidad tu vida. ¿Te animas a conocerlos?
          </p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="about-col">
          <div class="img">
            <img src="/static/imagenes/refugio3.jpg" alt="" class="img-fluid">
            <div class="icon"><i class="fas fa-store"></i></i></div>
          </div>
          <h2 class="title"><a href="{{url('/store')}}">¡Colabora!</a></h2>
          <p>
            Puedes colaborar comprando en nuestra tienda. Los fondos recaudados van directamente a favor del refugio. 
            Ayuda a que nuestros peluditos tengan un lugar donde refugiarse mientras buscan una familia.   
          </p>
        </div>
      </div>
    </div>
  </div>
</section><!-- Final Bienvenida Sección -->

<!-- ======= Sección de donación ======= -->
<section id="call-to-action">
<div class="container text-center" data-aos="zoom-in">
  <h2>DALE UNA MANO ¡HAZ TU DONACIÓN!</h2>
  <p>Actos de generosidad y compromiso como el que estás a punto de realizar, permiten que podamos seguir 
    desarrollando nuestra labor, por lo cual te estamos muy agradecidos.</p>
  <a class="cta-btn" href="{{url('/donations')}}">¡Dona Aquí!</a>
</div>
</section><!-- Final sección de donación -->

<!-- ======= Latest News Section ======= -->
<section id="last-news">
<header class="section-header">
  <h2>ULTIMAS NOTICIAS</h2>
</header>

@include('home.post')

</section> <!--Final de la seccion noticias-->

<section id="pre-footer">
<h3><span style="color:#555">UNA AMISTAD NO SE COMPRA,</span><span style="color: #828860"> ADÓPTAME</span></h3>
<img src="/static/imagenes/pie.png" alt="" class="imagen w-100">
</section>
@endsection