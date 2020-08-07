@extends('master')
@section('tittle', 'Contáctanos')
@section('style')
<link href="/static/css/bootstrapContacto.css" rel="stylesheet">
@section('contenido')

<hr>
<br><div class="mtop16">
@if (session('status'))
<div class="alert alert-success" style="text-align: center">
    {{ session('status') }}
</div>
@endif
@if (session('alert'))
<div class="alert alert-danger" style="text-align: center">
    {{ session('alert') }}
</div>
@endif
</div>
<div class="mtop16">
@if (count($errors)>0)
<div class="alert alert-danger" style="text-align: left">
    @foreach ($errors -> all() as $error)
        {{$error}}
    @endforeach
</div>
 @endif
</div>
      <section id="about">
        <div class="container">
          <div class="row">
            <div class="col-md-6 pt-4">
              <h3>Escríbenos</h3>
              
              <div class="form-group">
                <fieldset>
                  {!!  Form::open(['url'=>'/contact/form', 'method'=>'POST']) !!}
                  <label for="nombre" class="mt-2 pt-2">Nombre</label>
                  <input id="nombre" name="nombre" type="text" class="form-control" required>
                  <label for="email" class="mt-2 pt-2">Email</label>
                  <input id="email" name="email" type="email" class="form-control"required>
                  <label for="mensaje" class="mt-2 pt-2">Mensaje</label>
                  {!! Form::textarea('mensaje', null, ['class'=>'form-control', 'required', 'rows'=>'10'])!!}
                  <div class="boton pt-5" style="text-align: center;">
                    <button type="submit" class="btn btn-adopta">Enviar</button> 
                  </div>
                  {!! Form::close() !!}
                </fieldset>
              </div>
              
            </div>
            <div class="col-md-6 pt-4">
              <h3>Contáctos</h3>
              <div class="form-group">
                <fieldset>
                  <h4>Puedes contactarte con nosotros por los siguientes medios</h4>
                  <p> <b>Correo eléctronico:</b> refugiojacarina2020@yahoo.com </p>
                  <p> <b>Télefono:</b>  0995575003</p>
                  <p> <b>Facebook:</b> La Jacarina</p>
                  <p> <b>Instagram:</b>  @lajarinarefugio </p>
                </fieldset>
              </div>
               <!--Google map-->
               <h3 style="text-align: left;">Ubicación</h3>
               <div id="map-container-section left class="z-depth-1-half map-container-section mb-4" style="height: 400px">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3376.01739095117!2d-78.94091349394687!3d-2.8195385559109556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cd16b987a10963%3A0x196303b234d446c0!2sIglesia%20de%20Jacarin%2C%20Virgen%20del%20Rosario!5e0!3m2!1ses!2sec!4v1591070343485!5m2!1ses!2sec"
                   width="600" height="330" frameborder="0" style="border:0;" allowfullscreen, aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
          </div>
        </div>
      </section> <!--Fin información personal-->
      <section id="mashup">
        <div class="container">
          <h5>Te invitamos a visitar <a href="{{url('/service')}}">VetAPI</a> para que conozcas lasveterinarias disponibles en la ciudad de Cuenca</h5>
        </div>

      </section>
@endsection