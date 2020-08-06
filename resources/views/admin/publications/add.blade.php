@extends('admin.master')
@section('tittle', 'Agregar publicación')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Noticias</a>
</li>
<li class="active">
    <a  href="{{url('/admin/publications')}}" style="color: #828860; font-size: 18px;">Publicaciones</a>
</li>
<li class="active">
    <a href="{{url('/admin/publications/add')}}" class="nav-link" style="color: #828860; font-size: 18px;">Agregar publicación</a>
</li>
@endsection

@section('contenido')
<div class="col-xs-12 col-md-12 col-lg-12 ">
    <div class="panel panel-body ">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Nueva publicación</h3>
                @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors -> all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {!!Form::open(array('url'=>'/admin/publications/add', 'method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                
                {{Form::token()}}
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" required value="{{old('titulo')}}" class="form-control" placeholder="Título">
                    </div>
                    </div>
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Autor</label>
                        <p>
                        <select name="idautor" class="form-control">
                            @foreach ($users as $u)
                            <option value="{{$u->id}}">{{$u->name}}</option>
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
                        <input type="date" name="fecha" required value="{{old('fecha')}}" class="form-control" placeholder="Fecha">
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="contenido">Contenido</label>
                        {!! Form::textarea('contenido',null,['class'=>'form-control', 'id'=>'editor', 'class' => 'ckeditor']) !!}
                    </div>
                </div>
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen"  class="form-control" > 
                       
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </div>
            </div>

                {!!Form::close()!!}
                
            </div>
        </div>
    </div>
</div>
@endsection