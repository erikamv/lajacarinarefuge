@extends('master')
@section('tittle', 'Colaboradores')
@section('style')
<link href="/static/css/bootstrapColaborador.css" rel="stylesheet">
@section('contenido')
 <!--Foto-->
 <section id="foto">
    <img src="/static/imagenes/Colaborador.png" alt="" class="w-100">
  </section>
  <section id="about">
    <div class="container">
      <header class="section-header pt-5">
        <h2>Patrocinadores</h2>
      </header>
      <div class="about-col">
        <p>
          Desde La Jacarina queremos agradecer la colaboración de estas empresas, que con su esfuerzo y 
          apoyo nos ayudan en nuestra labor de rescatar y salvar animales maltratados y abandonados.
        </p>
      </div>
      <div class="about-col pt-4">
        <fieldset>
          <div class="row">
            <div class="col-md-3">
              <img src="/static/imagenes/logo-procan.png" alt="PRO-CAN" width="200px">
            </div>
            <div class="col-md-9">
              <a href="https://www.procan.com.ec/" style="color: #555;"><h4>PRO-CAN</h4></a>
              <p>Nos dona comida mensualmente para nuestros rescatados. Muchas gracias por su ayuda</p>
              <br>
              <p>Alimento completo y balanceado, elaborado con el balance perfecto de nutrientes naturales para tu perro.</p>
            </div>
          </div>
        </fieldset>
      </div>
      <br>
          <div class="mtop16">
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
      <div class="about-col pt-5">
        <h4>¿Te gustaria ser nuestro patrocinador?</h4>
        <p>Llena el siguiente formulario y nos contactaremos contigo</p>
      </div>
      <div class="about-col pt-4">
        
        <fieldset>
          <legend>Información Básica</legend>
          {!! Form::open(['url'=>'/collaborators/form', 'method'=>'POST']) !!}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="empresa">Nombre Empresa:</label>
                <input id="empresa" name="empresa" type="text" class="form-control" required>
              </div>
              <div class="form-group col-md-6">
                <label for="email">Email:</label>
                <input id="email" name="email" type="email" class="form-control" required>
              </div>
            </div>
            <div class="form-row pt-3">
                <div class="form-group col-md-6">
                  <label for="direccion">Dirección:</label>
                  <input id="direccion" name="direccion" type="text" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="telefono">Teléfono:</label>
                  <input id="telefono" name="telefono" type="tel" class="form-control" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                </div>
              </div>
              <div class="form-row pt-3">
                <div class="form-group col-md-12">
                    <label for="mensaje">Mensaje adicional:</label>
                    <textarea name="mensaje" id="mensaje"  class="form-control" cols="30" rows="5"></textarea>
                  </div>
                </div>
            <div class="boton pt-4" style="text-align: center;">
              <button type="submit" class="btn btn-adopta">Guardar cambios</button>
            </div>
            {!! Form::close() !!}
        </fieldset>
      </div>
    </div>    
  </section> <!--Fin información personal-->

@endsection