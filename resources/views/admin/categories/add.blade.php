@extends('admin.master')
@section('tittle', 'Agregar categoría')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Tienda</a>
</li>
<li class="active">
    <a  href="{{url('/admin/categories')}}" style="color: #828860; font-size: 18px;">Categorías</a>
</li>
<li class="active">
    <a href="{{url('/admin/categories/add')}}" class="nav-link" style="color: #828860; font-size: 18px;">Agregar categoría</a>
</li>
@endsection

@section('contenido')
<div class="col-xs-12 col-md-12 col-lg-12 ">
    <div class="panel panel-body ">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Nueva categoría</h3>
                @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors -> all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {!!Form::open(['url'=>'admin/categories/add'])!!}
                
                {{Form::token()}}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" class="form-control" placeholder="Descripcion">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>

                {!!Form::close()!!}
                
            </div>
        </div>
    </div>
</div>
@endsection