<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--Titulo de Pagina-->
        <title>@yield('tittle')</title>

        <link href="{{asset('https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@100;200;300;400;500;700;800;900&display=swap')}}" rel="stylesheet">
        <link href="{{asset('https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap')}}" rel="stylesheet">
        <link href="{{asset('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap')}}" rel="stylesheet">
        <script src="{{asset('https://kit.fontawesome.com/ad4a5737a5.js')}}" crossorigin="anonymous"></script>
        @yield('style')
    </head>
    <body>
      <section id="topbar" class="d-none d-lg-block">
        <div class="container clearfix">
          <div class="contact-info float-left">
            <i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">refugiojacarina2020@yahoo.com</a>
            <i class="fa fa-phone"></i> +1 5589 55488 55
          </div>
          <div class="social-links float-right">
            <a href="#" class="facebook" title="Facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="instagram" title="Instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" class="twitter" title="Twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="youtube" title="Youtube"><i class="fab fa-youtube"></i></i></a>
            @if(!Auth::guest())
            <a href="{{url('/products/'.Auth::user()->id.'/cart')}}" class="carrito" title="Carrito">
              <i class="fas fa-shopping-cart"></i>
              <span id="cart_menu_num" data-action="cart-can" class="badge rounded-circle">{{$carrito->productsSize()}}</span>
            </a>
            @endif
          </div>
        </div>
      </section>

        <!--Barra de menu-->
      <header id="header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="logo" href="{{url('/')}}" style="padding-left: 8%;">
            <img src="{{asset('/static/imagenes/logoJacarina.png')}}" class="d-inline-block align-top" alt="logo-jacarina">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="menu">
                <ul class="navbar-nav">
                  <li class="item-activo px-3"><a href="{{url('/')}}">INICIO</a></li>
                  <li class="item px-3"><a href="{{url('/information')}}">¿QUIÉNES SOMOS?</a></li>
                  <li class="item px-3"><a href="#">¿CÓMO AYUDAR?</a>
                    <ul class="desple">
                      <li><a href="{{url('/adoptions/all')}}"> Adoptar/Apadrinar</a></li>
                      <li><a href="{{url('/donations')}}"> Donar</a></li>
                      <li><a href="{{url('/homes/form')}}"> Hogar Temporal</a></li>
                      <li><a href="{{url('/volunteer/form')}}"> Voluntariado</a></li>
                      <li><a href="{{url('/collaborators/form')}}"> Patrocinador</a></li>
                    </ul>
                  </li>
                  <li class="item px-3"><a href="{{url('/products/all')}}">TIENDA</a></li>
                  <li class="item px-3"><a href="{{url('/contact/form')}}">CONTÁCTANOS</a></li>
                
                  <!--Usuario no registrado-->
                  @if(Auth::guest())
                  <li class="item px-3"><a href="{{url('/login')}}" class="inicio" id="navbarNavAltMarkup" title="Iniciar Sesión"><i class="far fa-user-circle"></i></a></li>
                   <!--Usuario registrado-->
                  @else
                <li class="item px-3">
                    <a href="#" >
                        @if(is_null(Auth::user()->avatar)) 
                        <img src="{{url('/static/imagenes/usuario.png')}}" alt="{{Auth::user()->name}}"  height="25px" style="border-radius: 12px"> 
                        @endif 
                        Hola {{Auth::user()->name}} 
                    </a>
                    <ul class="desple">
                        <li><a href="{{url('/account')}}"><i class="fa fa-user-circle"></i> Mi cuenta</a></li>
                        <li><a href="{{url('/account/edit')}}"><i class="fa fa-edit"></i> Configuración</a></li>
                        <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out-alt"></i> Salir</a></li>
                    </ul>
                  @endif
                  </li>
                </ul>
              </div>
          </div>
        </nav> 
      </header>


      <!--Contenido-->
      @yield('contenido')
    




      <!-- Site footer -->
      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-5">
              <h5>Nosotros</h5>
              <p class="text-justify">Grupo de voluntarios que poseen un refugio que alberga cerca de 40 animalitos rescatados de la calle 
                o de alguna situación de maltrato. Nuestro objetivo a futuro es incrementar el apoyo de esta fundación para realizar mejoras y dar una mejor vida a estos grandiosos animales.</p>
            </div>
  
            <div class="col-xs-6 col-md-4">
              <h5>Menu Principal</h5>
              <div class="menu">
                <ul class="navbar-nav">
                  <li class="foot_item"><a href="#">Inicio</a></li>
                  <li class="foot_item"><a href="#">¿Quiénes Somos?</a></li>
                  <li class="foot_item"><a href="#">¿Como Ayudar?</a>
                    <ul class="foot_desple">
                      <li><a href=""> Adoptar/Apadrinar</a></li>
                      <li><a href=""> Donar</a></li>
                      <li><a href=""> Hogar Temporal</a></li>
                      <li><a href=""> Voluntariado</a></li>
                      <li><a href=""> Patrocinador</a></li>
                      
                    </ul>
                  </li>
                  <li class="foot_item"><a href="#">Tienda</a></li>
                  <li class="foot_item"><a href="#">Contáctanos</a></li>
                </ul>
            </div>
          </div>
  
            <div class="col-xs-6 col-md-3">
              <h5>Información</h5>
              <p style="line-height: 1rem;">La Jacarina - Refugio de Perros</p>
              <p style="line-height: 1rem;">Deleg - Sector Jacarin</p>
              <p style="line-height: 1rem;">refugiojacarina2020@yahoo.com</p>
              <p style="line-height: 1rem;">Cuenca - Ecuador</p>
            </div>
          </div>
          <hr>
        </div>
        <div class="copyright container">
          <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
              <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by 
                <a href="#">La Jacarina</a>
              </p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <ul class="social-icons">
                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a class="youtube" href="#"><i class="fab fa-youtube"></i></a></li>   
              </ul>
            </div>
          </div>
        </div>
    </footer>

      <script src="{{asset('https://code.jquery.com/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js')}}" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js')}}" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      <script src="{{asset('/static/js/carrusel.js')}}"></script> 
      <script src="{{asset('/static/js/validarExt.js')}}"></script>  
    </body>

</html>