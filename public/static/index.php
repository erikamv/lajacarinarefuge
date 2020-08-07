<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VetAPI</title>
        <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@100;200;300;400;500;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/ad4a5737a5.js" crossorigin="anonymous"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
          #mapa {
            height: 100vh;
          }
        </style>
    </head>
    <body>
        <!--Barra de menu-->
      <header id="header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="titulo" style="margin-left:45%">
            <a style="color: #666088;font-size:3rem;font-weight:400" href="#"><span style="color: #828860;">Vet</span>API</a>
          </div>
        </nav>
        <div class="descripcion px-4" style="text-align: center;">
          <p>Encuentre información sobre las principales veterinarias de la ciudad de Cuenca</p>
        </div>
      </header>
    <hr>
    <div class="contenedor" style="margin-left: 2rem; margin-right:2rem">
      <div class="row">
        <div class="col-md-4">
        <h4>Pulsa sobre un marcador para mas información</h4>
        </div>
        <div class="col-md-8">
          <div class="buscador" style="margin-left: 28rem;">
            <textarea id="query" name="query" cols="50" rows="1"></textarea>
            <button id="search-button" class="btn" type ="button" disabled onclick="search(); buscador();" style="background-color: #fff;color:black;padding:0.001rem"><i class="fas fa-info"></i></button>
          </div>
        </div>
      </div>
      <div class="row">
      <div id="login-container" class="pre-auth">
        <a href="#" id="login-link"></a>
      </div>
        <div class="col-md-12">
        
          <div id="mapa">
                  <!--Mapa-->
          </div>
        </div>
      </div>
      </div>

      <div class="info pt-4 pl-5 pr-5">
        <div class="row">
        <div class="col-md-5">
        <h4>VÍDEOS RELACIONADOS</h4>
          <div id="buttons pt-2">
            <div class="row">
              <div id="search-container">
                <!--Videos-->
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-7">
        <h4>PÁGINAS RELACIONADAS</h4>
          <div id="noticias">

          </div>
        </div>
        </div>
      </div>
    </div>
      
    <!-- Site footer -->
      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-5">
              <h5>Nosotros</h5>
              <p class="text-justify">
                Esta API ha sido por el grupo de La Jacarina creada con la finalidad de encontrar información sobre los servicios 
                veterinarios que existen en la ciudad de Cuenca. 
              </p>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxoq2E2FB_m9gx30LhrkVscJWPENsmed4&callback=initMap"></script>
    <script src="https://www.gstatic.com/external_hosted/jquery2.min.js"></script>
    <script type="text/javascript">
      function initMap() {
          var map;
          var bounds = new google.maps.LatLngBounds();
          var mapOptions = {
              mapTypeId: 'roadmap'
          };

          map = new google.maps.Map(document.getElementById('mapa'), {
              mapOptions
          });

          map.setTilt(50);

          // Crear múltiples marcadores desde la Base de Datos 
          var marcadores = [<?php include('marcadores.php'); ?>];

          // Creamos la ventana de información con los marcadores 
          var mostrarMarcadores = new google.maps.InfoWindow(),marcadores, i;

          // Colocamos los marcadores en el Mapa de Google 
          for (i = 0; i < marcadores.length; i++) {
            var general=marcadores[i];
            for (j=0; j < general.length; j++){
              var position = new google.maps.LatLng(general[1], general[2]);
              bounds.extend(position);
              marker = new google.maps.Marker({
                  position: position,
                  map: map,
                  title: general[0]
              });

              // Colocamos la ventana de información a cada Marcador del Mapa de Google 
              google.maps.event.addListener(marker, 'click', (function(marker, j) {
                var contenido =
                '<div class="info_content">' +
                '<p>'+general[3]+'</p>' +
                '<p>'+general[0]+'</p>'+
                '</div>'; 
                  return function() {
                    mostrarMarcadores.setContent(contenido);
                    mostrarMarcadores.open(map, marker);
                  }
              })(marker, j));

              // Poner el nombre del marker en el input
              google.maps.event.addListener(marker, 'click', (function(marker, j) {
                  var info=general;
                  return function() {
                    var video=info[3];
                    console.log(video);
                    document.getElementById("query").value = video;
                  }
              })(marker, j));



              // Centramos el Mapa de Google para que todos los marcadores se puedan ver 
              map.fitBounds(bounds);
            }
          }

          // Aplicamos el evento 'bounds_changed' que detecta cambios en la ventana del Mapa de Google, también le configramos un zoom de 14 
          var boundsListener = google.maps.event.addListener((map), 'click', function(event) {
              this.setZoom(14);
              google.maps.event.removeListener(boundsListener);
          });

      }
      // Lanzamos la función 'initMap' para que muestre el Mapa con Los Marcadores y toda la configuración realizada 
      google.maps.event.addDomListener(window, 'load', initMap);
    </script>
     <script src="js/auth.js"></script>
    <script src="js/search.js"></script>
    <script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>
    <script src="js/buscador.js"></script>
    <script src="js/imagenes.js"></script>
  </body>
</html>