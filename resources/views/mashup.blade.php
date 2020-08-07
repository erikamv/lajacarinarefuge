@extends('master')
@section('tittle', 'VPI')
@section('style')
<link href="/static/css/bootstrapVPI.css" rel="stylesheet">
@section('contenido')
<style type="text/css">
    #mapa {
      height: 100vh;
    }
  </style>
  <hr>
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
  
<script type="text/javascript" src="{{asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyCxoq2E2FB_m9gx30LhrkVscJWPENsmed4&callback=initMap')}}"></script>
<script src="{{asset('https://www.gstatic.com/external_hosted/jquery2.min.js')}}"></script>


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
        var marcadores = {{url('/static/marcadores.php')}};

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

    <script src="{{asset('/static/js/auth.js')}}"></script>
    <script src="{{asset('/static/js/search.js')}}"></script>
    <script src="{{asset('https://apis.google.com/js/client.js?onload=googleApiClientReady')}}"></script>
    <script src="{{asset('/static/js/buscador.js')}}"></script>
    <script src="{{asset('/static/js/imagenes.js')}}"></script>

@endsection