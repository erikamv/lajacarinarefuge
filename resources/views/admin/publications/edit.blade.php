@extends('admin.master')
@section('tittle', 'Editar publicación')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Noticias</a>
</li>
<li class="active">
    <a  href="{{url('/admin/publications')}}" style="color: #828860; font-size: 18px;">Publicaciones</a>
</li>
<li class="active">
    <a href="{{url('/admin/publications/edit')}}" class="nav-link" style="color: #828860; font-size: 18px;">Editar publicación</a>
</li>
@endsection
@section ('contenido')
<div class="col-xs-12 col-md-12 col-lg-12 ">
    <div class="panel panel-body ">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar publicación: {{$publication->titulo}}</h3>
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
            <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12">
            {!!Form::open(array('url'=>'/admin/publications/'.$publication->idpublicacion.'/edit', 'method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}   
            {{Form::token()}}
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" class="form-control" value="{{$publication->titulo}}" required placeholder="Título">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Autor</label>
                        <p>
                        <select name="idautor" class="form-control">
                            @foreach ($users as $u)
                            @if ($u->id == $publication->idautor)
                            <option value="{{$u->id}}" selectec>{{$u->name}}</option>
                            @else
                            <option value="{{$u->id}}">{{$u->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </p>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label>Tipo</label>
                        <p>
                        <select name="tipo" class="form-control">
                            <option value="Donaciones">Donaciones</option>
                            <option value="Rescates">Rescates</option>
                            <option value="Noticias">Noticias</option>
                            <option value="Adopciones">Adopciones</option>
                            <option value="Blog">Blog</option>
                        </select>
                    </p>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" required value="{{$publication->fecha}}" class="form-control" placeholder="Fecha">
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="contenido">Contenido</label>
                        {!! Form::textarea('contenido',$publication->contenido,['class'=>'form-control', 'id'=>'editor', 'class' => 'ckeditor', 'value'=> '{{$publication->contenido}}']) !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen" class="form-control" >
                        @if (($publication->imagen)!="")
                            <img src="{{url('/static/imagenes/publicaciones/'.$publication->imagen)}}" alt="" heigth="250px" width="200px">
                        @endif 
                    </div>
                </div>
            </div>
            
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Guardar</button>
                       
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                       
                        <button class="btn btn-danger btn-block" type="reset">Cancelar</button>
                    </div>
                </div>
       
        </div>
    </div>
        {!!Form::close()!!}
</div>


    
@endsection