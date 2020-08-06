@extends('master')
@section('tittle', 'Editar perfil')
@section('style')
<link href="{{asset('/static/css/bootstrapInicio.css')}}" rel="stylesheet">
@section('contenido')
<!--Cabecera-->

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="/static/css/account.css">
<hr><br><br>
<div class="container">
    {!! Form::open(['url' => '/account/edit']) !!}
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="panel">
                <div class="header" >
                    <h2 class="tittle"><i class="fa fa-user-edit"></i><strong> Editar avatar</strong></h2>
                </div>
                <div class="panel panel-body">
                    @if ((Auth::user()->avatar)!="")
                    <a href="{{url('/static/imagenes/usuarios/'.Auth::user()->avatar)}}" data-fancybox="gallery">
                        <img src="{{url('/static/imagenes/usuarios/'.Auth::user()->avatar)}}" alt="" heigth="250px" width="250px">
                    </a>
                    @endif
                </div><br>
                <div class="panel panel-body">
                    <input type="file" name="avatar" class="form-control" ><br>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="panel ">
                <div class="header" >
                    <h2 class="tittle"><i class="fa fa-address-card"></i><strong> Editar información</strong></h2><br>
                </div>
                <div class="panel panel-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p><label for="name"><strong>Nombre:</strong> </label>
                                {!! Form::text('name', Auth::user()->name, ['class'=> 'form-control']) !!}
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p><label for="lastname"><strong>Apellido:</strong> </label>
                                {!! Form::text('lastname', Auth::user()->lastname, ['class'=> 'form-control']) !!}
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p><label for="phone"><strong>Contacto:</strong> </label>
                                {!! Form::number('phone', null, ['class'=> 'form-control','required']) !!}
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p><label for="email"><strong>Correo electrónico:</strong> </label>
                                {!! Form::text('email', Auth::user()->email, ['class'=> 'form-control', 'disabled']) !!}
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p><label for="birthday"><strong>Fecha de nacimiento:</strong> </label>
                                {!! Form::date('birthday', null, ['class'=> 'form-control', 'required']) !!}
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <br>
                            <p><label for="gender"><strong>Sexo:</strong> </label>
                                {!! Form::select('gender', ['0' => 'Sin especificar','1' => 'Femenino','2' => 'Masculino'], ['class'=> 'form-control', 'required']) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="margin-left: 500px">
                <div class="form-group" >
                    <button class=" btn-primary btn-lg" type="submit">Guardar</button>
                    <button class=" btn-danger  btn-lg" type="reset">Cancelar</button><br><br>
                </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
            <div class="panel panel-body">
                <div class="header" >
                    <h2 class="tittle"><i class="fa fa-fingerprint"></i><strong> Editar contraseña</strong></h2>
                </div>
            
                {!! Form::open(['url'=> '/account/edit/password',  'method'=>'POST','autocomplete'=>'off','files'=>'true'] ) !!}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p><label for="apassword"><strong>Contraseña actual:</strong> </label>
                        {!! Form::password('apassword', ['class'=> 'form-control', 'required']) !!}
                    </p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p><label for="password"><strong>Nueva contraseña:</strong> </label>
                        {!! Form::password('npassword', ['class'=> 'form-control', 'required']) !!}
                    </p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p><label for="password"><strong>Confirmar contraseña:</strong> </label>
                        {!! Form::password('cpassword', ['class'=> 'form-control', 'required']) !!}
                    </p>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <button class=" btn-primary btn-lg" type="submit">Guardar</button>
                    <button class=" btn-danger btn-lg" type="reset">Cancelar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
       
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
            <div class="panel panel-body">
                <div class="header" >
                    <h2 class="tittle"><i class="fa fa-star"></i><strong> Redes sociales</strong></h2>
                </div>
                {!! Form::open(['url'=> '/account/edit/password'] ) !!}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p><label for="facebook"><strong>Facebook:</strong> </label>
                        {!! Form::text('facebook',  null,['class'=> 'form-control']) !!}
                    </p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p><label for="instagram"><strong>Instagram</strong> </label>
                        {!! Form::text('instagram',  null,['class'=> 'form-control']) !!}
                    </p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p><label for="twitter"><strong>Twitter</strong> </label>
                        {!! Form::text('twitter',  null,['class'=> 'form-control']) !!}
                    </p>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <button class=" btn-primary btn-lg" type="submit">Guardar</button>
                    <button class=" btn-danger btn-lg" type="reset">Cancelar</button>
                </div>
            </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection