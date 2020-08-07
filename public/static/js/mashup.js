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
    var marcadores = [<?php include('/public/static/marcadores.php'); ?>];

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
