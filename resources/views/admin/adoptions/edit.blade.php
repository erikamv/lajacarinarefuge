@extends('admin.master')
@section('tittle', 'Editar formulario')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Solicitudes</a>
</li>
<li class="active">
    <a  href="{{url('/admin/adoptions/all')}}" style="color: #828860; font-size: 18px;">Adopciones</a>
</li>
<li class="active">
    <a href="{{url('/admin/adoptions/edit')}}" class="nav-link" style="color: #828860; font-size: 18px;">Editar formulario</a>
</li>
@endsection
@section ('contenido')

<div class="col-xs-12 col-md-12 col-lg-12 ">
    <div class="panel panel-body ">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar formulario: {{$adopcion->idadoptante}}</h3>
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
                {!!Form::open(array('url'=>'/admin/adoptions/'.$adopcion->idadoptante.'/edit', 'method'=>'POST'))!!}
                {{Form::token()}}
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        {!! Form::text('nombre', $adopcion->nombre, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        {!! Form::text('apellido', $adopcion->apellido, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="apellido">Animal::</label>
                        {!! Form::text('animal', $adoption->animal, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nacimiento">Fecha de nacimiento:</label>
                        {!! Form::date('nacimiento', $adopcion->fechaNacimiento, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="ciudad">Ciudad de residencia:</label>
                        {!! Form::text('ciudad', $adopcion->ciudad, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        {!! Form::text('direccion', $adopcion->direccion, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        {!! Form::email('email', $adopcion->email, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        {!! Form::number('telefono', $adopcion->telefono, ['class'=> 'form-control', 'disabled', 'pattern'=>'[0-9]{3}-[0-9]{2}-[0-9]{3}']) !!}
                    </div>
                </div>
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="fechaInicio">Fecha de adopción:</label>
                        {!! Form::date('fechaInicio', $adopcion->fechaAdopcion, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group col-md-6">
                        <label for="acuerdo">Las personas que conviven con Ud ¿Estan de acuerdo con la adopción?</label>
                        <p>{!! Form::select('familia', ['0'=>'No', '1'=>'Si'], $adopcion->familia, ['class'=>'form-control', 'required'])!!}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group col-md-6">
                        <label for="propiedad">La propiedad donde permanecera el animal es: </label>
                        <p>{!! Form::select('propiedad', ['Propia'=>'Propia', 'Arrendada'=>'Arrendada'], $adopcion->familia, ['class'=>'form-control', 'required'])!!}</p>
                    </div>
                </div>
                                              
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="observaciones">¿Por qué deseas adoptar?</label>
                        {!! Form::textarea('porque', $adopcion->porque, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="observaciones">Describa detalladamente el lugar donde permanecera el animal (tipo, espacio, cerramiento)</label>
                        {!! Form::textarea('lugar', $adopcion->lugar, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="observaciones">¿Posees otros animales? Si es así, cuéntanos ¿Cuáles?</label>
                        {!! Form::textarea('observaciones', $adopcion->observaciones, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        {!! Form::select('estado', ['0'=>'Registrado', '1'=>'Activo', '2'=>'Descartado'], $adopcion->estado, [ 'class'=>'form-control'])!!}
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