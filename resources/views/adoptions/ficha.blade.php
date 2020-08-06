@extends('master')
@section('tittle', 'Ficha')
@section('style')
<link href="/static/css/bootstrapFicha.css" rel="stylesheet">
@section('contenido')
<hr>
 <!--Bienvenida-->
 <section id="about">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-md-12">
          <div class="categoria">
            <a href="{{url('/adoptions/all')}}">Volver atras</a>
            <button type="button" class="btn btn-modal" data-toggle="modal" data-target="#myModal"><a href="#">Condiciones de adopción</a></button>
          </div>
        </div>
      </div>
      <!-- Modal -->
      
      <header class="section-header pt-5">
      <h2 class="nombre-perro">{{$animal->nombre}}</h2>
      </header>
      <div class="row about-cols">
        <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
          <div class="about-col">
            <div class="row">
              <div class="col-md-5">
                <div class="img">
                  <img src="{{url('/static/imagenes/animales/'.$animal->imagen)}}" alt="" class="img-fluid">
                </div>
              </div>
              <div class="info-perro col-md-7 pt-5">
                <p class="nombre">Edad: {{$animal->edad}} años</p>
                <p class="sexo">Sexo: {{getStatusSexArray(null,$animal->sexo)}}</p>
                <p class="peso">Peso: {{$animal->peso}} kg</p>
                <p class="raza">Raza: {{getStatusSizeArray(null,$animal->tamanio)}}</p>
                <p>Descripción:</p>
                <p class="descripcion">{{$animal->historia}}</p>
                 <p class="vacunas">Vacunas: {{getStatusArray(null,$animal->vacunas)}}</p>
                 <p class="esterilizado">Esterilizado: {{getStatusArray(null,$animal->esterilizacion)}}</p>
                 <div class="row">
                    <div class="col-md-5 botones p-5">
                      <a href="{{url('/adoptions/file/'.$animal->idanimal.'/adoptform')}}"><button type="button" class="btn btn-adopta">Quiero Adoptar</button></a>
                    </div>
                    
                    <div class="col-md-5 botones p-5">
                     <a href="{{url('/adoptions/file/'.$animal->idanimal.'/parentform')}}"><button type="button" class="btn btn-adopta">Quiero Apadrinar</button></a> 
                    </div>
               
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Condiciones de Adopción</h4>
          </div>
          <div class="modal-body" style="text-align: justify;">
            <p>Cuando adoptes a tu nuevo compañero te lo entregaremos identificado, desparasitado, vacunado, y 
              esterilizado. En el momento de la adopción, deberás abonar $10 en concepto de donativo, para cubrir 
              parte de los tratamientos veterinarios. Es imprescindible que la persona que vaya a ser titular del 
              animal sea quien realice la adopción, para lo cual deberá presentar su cedula de identidad y firmar el 
              contrato de adopción.</p>

             <p>Si quieres adoptar a alguno de nuestros perros contáctanos para poder asesorarte adecuadamente. El 
               refugio La Jacarina se encuentra en Cuenca (Ecuador) y todas las adopciones que realizamos son 
               presenciales (no enviamos perros a ninguna parte).</p>   
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-adopta" data-dismiss="modal">Cerrar</button>
          </div>
        </div>

      </div>
    </div>
  </section><!-- Final Bienvenida Sección -->

@endsection