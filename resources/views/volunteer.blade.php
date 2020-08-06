@extends('master')
@section('tittle', 'Voluntariado')
@section('style')
<link href="/static/css/bootstrapVoluntario.css" rel="stylesheet">
@section('contenido')

       <!--Foto-->
       <section id="foto">
        <img src="/static/imagenes/Voluntario.png" alt="" class="w-100">
      </section>
      <section id="about">
        <div class="container">
          <header class="section-header pt-5">
            <h2>Voluntarios</h2>
          </header>
          <div class="about-col">
            <p>
              Nuestro equipo jacarino está conformado por personas que apoyan nuestra labor donando su tiempo, 
              talento y trabajo de forma totalmente libre y voluntaria. Un voluntario es quien está dispuesto a dar 
              parte de su tiempo libre para apoyar a los animales ya sea usando sus habilidades y talento, ayudando a 
              difundir nuestros perros en adopción, trabajando directamente con los animales, apoyando las jornadas de 
              adopción y mucho más.
            </p>
          </div>
          <div class="about-col pt-2">
            <h4>¿Qué se necesita para ser voluntario?</h4>
            <p> > Ser mayor de edad.</p>
            <p> > Vivir en Cuenca, Ecuador.</p>
            <p> > Tener muchas ganas de ayudar a los perritos de la calle.</p>
          </div>
          <div class="about-col pt-2">
            <h4>Unete a nuestro equipo</h4>
            <p>Necesitamos voluntari@s, manos para sostener, acariciar, dar cariño a nuestros animales. Para cuidar 
              nuestro refugio, para levantar nuestro proyecto. Pero también puedes apadrinar, donar o ser hogar temporal. 
              Compartiendo en las redes sociales, también puedes ayudar a salvar vidas. Entre tod@s podemos hacerlo 
              posible.</p>
            <p class="pt-2">Si te gustaría unirte el equipo jacarino llena el siguiente formulario y nos contáctaremos contigo.</p>
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
            <fieldset>
              <legend>Información Personal</legend>

              {!! Form::open(['url'=>'/volunteer/form', 'method'=>'POST']) !!}
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
                      <label for="direccion">Dirección:</label>
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
                  <div class="form-row pt-3">
                    <div class="form-group col-md-12">
                        <label for="observaciones">¿Has tenido experiencia como voluntario? Cuentános</label>
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
                <div class="boton pt-3" style="text-align: center;">
                 <button type="submit" class="btn btn-adopta">Guardar cambios</button>
                </div>
                {!! Form::close() !!}
            </fieldset>
            </div>
          </div>    
      </section> <!--Fin información personal-->

      @endsection