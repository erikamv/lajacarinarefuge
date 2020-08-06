@extends('master')
@section('tittle', 'Formulario de adopción')
@section('style')
<link href="/static/css/bootstrapAdoptar.css" rel="stylesheet">
@section('contenido')

<section id="about">
    <div class="container">
      <header class="section-header pt-5">
        <h2>Proceso de Adopcion</h2>
      </header>
      <div class="about-col pt-3">
        <h4>Requisitos</h4>
          <p> > Ser mayor de 18 años.</p>
          <p> > Rellenar el formulario de adopción, el refugio se pondra en contacto contigo y se agendara una
            entrevista personal.
      </div>
      <div class="about-col pt-2">
        <h4>Costo de Adopción</h4>
        <p>Todos nuestros rescatados pueden irse a sus nuevas familias previo pago del costo de adopción, destinado a cubrir cuidados veterinarios mínimos.</p>
        <p>El valor a pagar por la adopción es de $20, el pago se lo realizará el dia que se entregue a la mascota a su adoptante. Este 
        proceso se realiza de forma presencial, ya que, el adoptante debe firmar una carta compromiso de cuidado del animal.
        Las adopciones se atienden en riguroso orden de llegada de los cuestionarios.</p>
        <br>
        <p>Si estás decidido a adoptar a uno de nuestros animales puedes rellenar el siguiente formulario</p>
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
        <fieldset>
          <legend>Información Personal</legend>
          {!! Form::open(['url'=>'/adoptions/file/{id}/adoptform', 'method'=>'POST']) !!}
            <div class="form-row">
              <div class="form-group col-md-6">
                <p><label for="nombre">Nombre:</label></p> 
                {!! Form::text('nombre', Auth::user()->name,['class'=>'form-control', 'required']) !!}
              </div>
              <div class="form-group col-md-6">
                <label for="apellido">Apellido:</label>
                {!! Form::text('apellido', Auth::user()->lastname,['class'=>'form-control', 'required']) !!}
              </div>
            </div>
            <div class="form-row pt-3">
              <div class="form-group col-md-6">
                <label for="nacimiento">Fecha de nacimiento:</label>
                {!! Form::date('nacimiento', Auth::user()->birthday,['class'=>'form-control', 'required']) !!}
              </div>
              <div class="form-group col-md-6">
                <label for="animal">Datos del animal:</label>
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" name="idanimal" value="{{$animal['idanimal']}}"  class="form-control">
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="nanimal" value="{{$animal['nombre']}}"  class="form-control">
                  </div>
                </div>
              </div>
              </div>
              <div class="form-row pt-3">
                <div class="form-group col-md-6">
                  <label for="ciudad">Ciudad de residencia:</label>
                  {!! Form::text('ciudad', null,['class'=>'form-control', 'required']) !!}
                </div>
                <div class="form-group col-md-6">
                  <label for="direccion">Dirección (incluir Sector):</label>
                  {!! Form::text('direccion', null,['class'=>'form-control', 'required']) !!}
                </div>
              </div>
              <div class="form-row pt-3">
                <div class="form-group col-md-6">
                  <label for="email">Email:</label>
                  {!! Form::email('email', Auth::user()->email,['class'=>'form-control', 'disabled']) !!}
                </div>
                <div class="form-group col-md-6">
                  <label for="telefono">Teléfono:</label>
                  {!! Form::number('telefono', Auth::user()->phone,['class'=>'form-control', 'required', 'pattern'=>'[0-9]{3}-[0-9]{2}-[0-9]{3}']) !!}

                </div>
              </div>
        </fieldset>
        </div> <!--Fin Información Personal-->
        <div class="about-col pt-5">
          <fieldset>
            <legend>Preguntas Varias</legend>
            <form role="form" id="form">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="acuerdo">Las personas que conviven con Ud ¿Estan de acuerdo con la adopción?</label>
                  <p>{!! Form::select('familia', ['0'=>'No', '1'=>'Si'], null, ['class'=>'form-control', 'required'])!!}</p>
                </div>
                <div class="form-group col-md-6">
                  <label for="propiedad">La propiedad donde permanecera el animal es: </label>
                  <select name="propiedad" id="propiedad" class="form-control" required>
                    <option class="propiedad" value="Propia" >Propia</option>
                    <option class="propiedad" value="Arrendada">Arrendada</option>
                  </select>
                </div>
              </div>
              <div class="form-row pt-3">
                <div class="form-group col-md-12">
                  <label for="porque">¿Por qué deseas adoptar?</label>
                  <textarea name="porque" id="porque" class="form-control" cols="30" rows="5" required></textarea>
                </div>
              </div>
              <div class="form-row pt-3">
                <div class="form-group col-md-12">
                  <label for="observaciones">¿Posees otros animales? Si es así, cuéntanos ¿Cuáles?</label>
                  <textarea name="observaciones" id="observaciones"  class="form-control" cols="30" rows="5" required></textarea>
                </div>
              </div>
              <div class="form-row pt-3">
                <div class="form-group col-md-12">
                  <label for="lugar">Describa detalladamente el lugar donde permanecera el animal (tipo, espacio, cerramiento)</label>
                  <textarea name="lugar" id="lugar"  class="form-control" cols="30" rows="5" required></textarea>
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
    </div>          
  </section>

@endsection