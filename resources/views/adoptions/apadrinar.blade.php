@extends('master')
@section('tittle', 'Formulario de apadrinamiento')
@section('style')
<link href="/static/css/bootstrapApadrina.css" rel="stylesheet">
@section('contenido')

<section id="about">
    <div class="container">
      <header class="section-header pt-5">
        <h2>Apadrina</h2>
      </header>
      <div class="about-col">
        <p>
          Apadrinando tienes la oportunidad de aportar con los gastos de manutención y veterinarios del animal que decidas ayudar.
          Te mantendremos informado siempre que lo solicites, en tu correo electrónico o por whatsapp, de la evolución de tu apadrinado.
        </p>
        <br>
        <p>Los pagos se deben realizar de forma mensual ya sea mediante un debito, transferencia o botón de pagos y el monto minimo a donar es de $10.</p>
      </div>

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
          <legend>Débito Automático</legend>
          {!! Form::open(['url'=>'/adoptions/file/{id}/adoptform', 'method'=>'POST', 'files'=>'true']) !!}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nombre">Nombres:</label>
                {!! Form::text('nombre', Auth::user()->name,['class'=>'form-control', 'required']) !!}
              </div>
              <div class="form-group col-md-6">
                <label for="apellido">Apellidos:</label>
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
                  <label for="direccion">Dirección:</label>
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
              <div class="form-row pt-3">
                <div class="form-group col-md-12">
                  <p>
                    Es necesario llenar el <a href="#">formulario</a> de autorización de débito automático. Subelo junto con una copia de tu cédula de identidad</p>
                    <br>
                    <input id="archivoPadrino" type="file" class="imagenes" name="archivoPadrino[]" multiple="true" required onchange="validarExt()">
                  </div>
              </div>
              <div class="form-row pt-3">
                <div class="form-group col-md-12">
                  <input type="checkbox" id="politicas" name="politicas" value="acepto" required>
                  <label for="politicas" style="margin-left: 0.5rem;"> Acepto la Política de 
                    <a href="#" style="color: #828860;">Privacidad de Datos</a></label><br>
                </div>
              </div>
            <div class="boton pt-5" style="text-align: center;">
              <button type="submit" class="btn btn-adopta"> Guardar cambios</button>
            </div>
            {!! Form::close()!!}
        </fieldset>
        </div> <!--Fin Información Personal-->

        <div class="about-col pt-3">
          <fieldset>
            <legend>Mas Opciones</legend>
            <form role="form" id="form">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <h3>Pagar con Paypal</h3>
                  <div class="form-group">
                    <label for="apadrinado">Nombre del apadrinado:</label>
                    <select name="apadrinado" id="apadrinado" class="form-control w-50" required>
                      <option value="{{$animal['idanimal']}}">{{$animal['nombre']}}</option>
                    </select>
                  </div>
                  <div class="pt-3" style="font-size: 1.1rem;">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                      <input type="hidden" name="cmd" value="_s-xclick">
                      <input type="hidden" name="hosted_button_id" value="NU6UJ67MPU8MW">
                      <table>
                      <tr><td><input type="hidden" name="on0" value="Aporte">Aporte</td></tr><tr><td><select name="os0">
                        <option value="Opción 1">Opción 1 : $10.00 USD - mensual</option>
                        <option value="Opción 2">Opción 2 : $20.00 USD - mensual</option>
                        <option value="Opción 3">Opción 3 : $30.00 USD - mensual</option>
                      </select> </td></tr>
                      </table>
                      <input type="hidden" name="currency_code" value="USD">
                      <input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                      <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
                    </form>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <h3>Depositos o transferencias</h3>
                  <p>Puedes realizar dépositos o transferencias bancarias mensualmente para tu apadrinado a la siguiente cuenta:</p>
                    <br>
                  <p><b>Nuestra Cuenta:</b> Banco del Pacifico</p>
                  <p><b>Cuenta de Ahorros:</b> 1043009352</p>
                  <p><b>Nombre:</b> Gina Bresciani</p>
                  <p><b>Cédula:</b> 0102524691</p>
                  <br>
                  <p>Para más información puede contactarse al 0995575003</p>
                </div>
              </div>
            </form>
          </fieldset>
        </div>
      </div>
    </div>          
  </section>

@endsection