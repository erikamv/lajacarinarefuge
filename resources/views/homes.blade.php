@extends('master')
@section('tittle', 'Hogar temporal')
@section('style')
<link href="/static/css/bootstrapHogar.css" rel="stylesheet">
@section('contenido')

<!--Foto-->
<section id="foto">
    <img src="/static/imagenes/Hogar Temporal.png" alt="" class="w-100">
  </section>
  <section id="about">
    <div class="container">
      <header class="section-header pt-5">
        <h2>Hogar Temporal</h2>
      </header>
      <div class="about-col">
        <p>
          Una linda forma en que puedes ayudar a un perro abandonado, es ofreciendo ser hogar temporal para 
          aquellos que aún no encuentran a su familia definitiva. Tú cuéntanos el tamaño que te acomoda tener y 
          nosotros te entregaremos una mascota, para que le des amor y cuidados mientras continuamos promoviendo su 
          adopción y éste encuentra un hogar definitivo.
        </p>
      </div>
      <div class="about-col pt-2">
        <h4>¿Qué implica ser hogar temporal?</h4>
        <p> > Alimentarlo.</p>
        <p> > Llevarlo al veterinario en caso de ser necesario.</p>
        <p> > Llevarlo a jornadas de adopción del refugio.</p>
        <p> > Sacarle lindas fotos para que podamos difundirlo en internet y nuestras redes sociales.</p>
      </div>
      <div class="about-col pt-2">
        <p>Si te gustaría colaborar como hogar temporal llena el siguiente formulario y nos contactaremos contigo.</p>
      </div><br>
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
        {!! Form::open(['url'=>'/homes/form', 'method'=>'POST']) !!}
        <fieldset>
          <legend>Información Personal</legend>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nombre">Nombre:</label>
                {!! Form::text('nombre', Auth::user()->name, ['class'=> 'form-control', 'required']) !!}
              </div>
              <div class="form-group col-md-6">
                <label for="apellido">Apellido:</label>
                {!! Form::text('apellido', Auth::user()->lastname, ['class'=> 'form-control', 'required']) !!}
              </div>
            </div>
            <div class="form-row pt-3">
              <div class="form-group col-md-12">
                <label for="nacimiento">Fecha de nacimiento:</label>
                {!! Form::date('nacimiento', Auth::user()->birthday, ['class'=> 'form-control', 'required']) !!}
              </div>
            </div>
              <div class="form-row pt-3">
                <div class="form-group col-md-6">
                  <label for="ciudad">Ciudad de residencia:</label>
                  {!! Form::text('ciudad', null, ['class'=> 'form-control', 'required']) !!}
                </div>
                <div class="form-group col-md-6">
                  <label for="direccion">Dirección (incluir Sector):</label>
                  {!! Form::text('direccion', null, ['class'=> 'form-control', 'required']) !!}
                </div>
              </div>
              <div class="form-row pt-3">
                <div class="form-group col-md-6">
                  <label for="email">Email:</label>
                  {!! Form::email('email', Auth::user()->email, ['class'=> 'form-control', 'disabled']) !!}
                </div>
                <div class="form-group col-md-6">
                  <label for="telefono">Teléfono:</label>
                  {!! Form::number('telefono', Auth::user()->phone, ['class'=> 'form-control', 'required', 'pattern'=>'[0-9]{3}-[0-9]{2}-[0-9]{3}']) !!}
                </div>
              </div>
        </fieldset>
        </div>
        <div class="about-col pt-5">
          <fieldset>
            <legend>Espacio Disponible</legend>
              <div class="form-row pt-3">
                <div class="form-group col-md-12">
                  <label for="lugar">¿Cuál es el espacio que dispones para hogar temporal?</label>
                  {!! Form::textarea('lugar', null, ['class'=> 'form-control', 'required', 'cols'=>'30', 'rows'=>'5']) !!}
                </div>
              </div>
              <div class="form-row pt-3">
              <div class="form-group col-md-12">
                  <label for="observaciones">¿Has tenido experiencia como hogar temporal? Cuentános</label>
                  {!! Form::textarea('observaciones', null, ['class'=> 'form-control', 'required', 'cols'=>'30', 'rows'=>'5']) !!}
                </div>
              </div>
              <div class="form-row pt-3">
                <div class="form-group col-md-12">
                  <input type="checkbox" id="politicas" name="politicas" value="acepto" required>
                  <label for="politicas" style="margin-left: 0.5rem;"> Acepto la Política de 
                    <a href="#" style="color: #828860;">Privacidad de Datos</a></label><br>
                </div>
              </div>
          </fieldset>
          </div>
          <div class="boton" style="text-align: center;">
            <button type="submit" class="btn btn-adopta">Guardar cambios</button>
          </div>
          {!! Form::close() !!}
      </div>    
  </section> <!--Fin información personal-->

@endsection