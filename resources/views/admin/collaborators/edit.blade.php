@extends('admin.master')
@section('tittle', 'Editar formulario')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Solicitudes</a>
</li>
<li class="active">
    <a  href="{{url('/admin/collaborators/all')}}" style="color: #828860; font-size: 18px;">Patrocinador</a>
</li>
<li class="active">
    <a href="{{url('/admin/collaborators/edit')}}" class="nav-link" style="color: #828860; font-size: 18px;">Editar formulario</a>
</li>
@endsection
@section ('contenido')

<div class="col-xs-12 col-md-12 col-lg-12 ">
    <div class="panel panel-body ">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar formulario: {{$collaborator->idcolaborador}}</h3>
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
                {!!Form::open(array('url'=>'/admin/collaborators/'.$collaborator->idcolaborador.'/edit', 'method'=>'POST'))!!}
                {{Form::token()}}
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="empresa">Empresa:</label>
                        {!! Form::text('empresa', $collaborator->empresa, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        {!! Form::text('direccion', $collaborator->direccion, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        {!! Form::email('email', $collaborator->email, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        {!! Form::number('telefono', $collaborator->telefono, ['class'=> 'form-control', 'disabled', 'pattern'=>'[0-9]{3}-[0-9]{2}-[0-9]{3}']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="fechaInicio">Fecha de inicio de actividades:</label>
                        {!! Form::date('fechaInicio', $collaborator->fechaInicio, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                                              
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="mensaje">Mensaje adicional:</label>
                        {!! Form::textarea('mensaje', $collaborator->observaciones, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="fechaFin">Fecha de finalización:</label>
                        {!! Form::date('fechaFin', $collaborator->fechaFin, ['class'=> 'form-control']) !!}
                    </div>
                </div> 
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        {!! Form::select('estado', ['0'=>'Registrado', '1'=>'Activo', '2'=>'Descartado'], $collaborator->estado, ['disabled', 'class'=>'form-control'])!!}
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