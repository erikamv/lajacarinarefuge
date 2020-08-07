@extends('admin.master')
@section('tittle', 'Editar formulario')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Solicitudes</a>
</li>
<li class="active">
    <a  href="{{url('/admin/contact/all')}}" style="color: #828860; font-size: 18px;">Contáctanos</a>
</li>
<li class="active">
    <a href="{{url('/admin/contact/edit')}}" class="nav-link" style="color: #828860; font-size: 18px;">Ver formulario</a>
</li>
@endsection
@section ('contenido')

<div class="col-xs-12 col-md-12 col-lg-12 ">
    <div class="panel panel-body ">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Ver formulario: {{$contacto->idcontacto}}</h3>
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
                {!!Form::open(array('url'=>'/admin/contact/'.$contacto->idcontacto.'/view', 'method'=>'POST'))!!}
                {{Form::token()}}
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        {!! Form::text('nombre', $contacto->nombre, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        {!! Form::email('email', $contacto->email, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="observaciones">Observaciones</label>
                        {!! Form::textarea('mensaje', $contacto->mensaje, ['class'=> 'form-control', 'disabled']) !!}
                    </div>
                </div>
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        {!! Form::select('estado', ['0'=>'Registrado', '2'=>'Descartado'], $contacto->estado, ['disabled', 'class'=>'form-control'])!!}
                    </div>
                </div>
                
                {!!Form::close()!!}
            </div>
        </div>
    </div>


@endsection 