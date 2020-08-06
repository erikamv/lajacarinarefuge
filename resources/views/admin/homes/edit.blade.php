@extends('admin.master')
@section('tittle', 'Editar formulario')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Solicitudes</a>
</li>
<li class="active">
    <a  href="{{url('/admin/homes/all')}}" style="color: #828860; font-size: 18px;">Hogar Temporal</a>
</li>
<li class="active">
    <a href="{{url('/admin/homes/edit')}}" class="nav-link" style="color: #828860; font-size: 18px;">Editar formulario</a>
</li>
@endsection
@section ('contenido')

<div class="col-xs-12 col-md-12 col-lg-12 ">
    <div class="panel panel-body ">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar formulario: {{$hogar->idhogar}}</h3>
                @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors -> all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
            
        <div class="row">
                {!!Form::open(array('url'=>'/admin/homes/'.$hogar->idhogar.'/edit', 'method'=>'POST'))!!}
                {{Form::token()}}
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        {!! Form::text('nombre', $hogar->nombre, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        {!! Form::text('apellido', $hogar->apellido, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nacimiento">Fecha de nacimiento:</label>
                        {!! Form::date('nacimiento', $hogar->fechaNacimiento, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="ciudad">Ciudad de residencia:</label>
                        {!! Form::text('ciudad', $hogar->ciudad, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        {!! Form::text('direccion', $hogar->direccion, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        {!! Form::email('email', $hogar->email, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        {!! Form::number('telefono', $hogar->telefono, ['class'=> 'form-control', 'disabled', 'pattern'=>'[0-9]{3}-[0-9]{2}-[0-9]{3}']) !!}
                    </div>
                </div>
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="fechaInicio">Fecha de inicio de actividades:</label>
                        {!! Form::date('fechaInicio', $hogar->fechaInicio, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                                              
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="observaciones">¿Has tenido experiencia como hogar temporal? Cuentános</label>
                        {!! Form::textarea('observaciones', $hogar->observaciones, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="lugar">¿Cuál es el espacio que dispones para hogar temporal?</label>
                        {!! Form::textarea('lugar', $hogar->lugar, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="fechaFin">Fecha de finalización:</label>
                        {!! Form::date('fechaFin', $hogar->fechaFin, ['class'=> 'form-control']) !!}
                    </div>
                </div> 
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        {!! Form::select('estado', ['0'=>'Registrado', '1'=>'Activo', '2'=>'Descartado'], $hogar->estado, ['disabled', 'class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="form-group" style="text-align: center;"><br>
                    <button type="submit" class="btn btn-adopta">Guardar cambios</button>
                </div>
            </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>


@endsection 