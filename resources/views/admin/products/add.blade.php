@extends('admin.master')
@section('tittle', 'Agregar artículo')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Tienda</a>
</li>
<li class="active">
    <a href="{{url('/admin/products')}}" style="color: #828860; font-size: 18px;">Artículos</a>
</li>
<li class="active">
    <a href="{{url('/admin/products/add')}}" class="nav-link" style="color: #828860; font-size: 18px;">Agregar artículo</a>
</li>
@endsection

@section('contenido')

                <div class="col-xs-12 col-md-12 col-lg-12 ">
                    <div class="panel panel-body ">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h3>Nuevo artículo</h3>
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

                        
                        {!!Form::open(array('url'=>'/admin/products/add/product', 'method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                        {{Form::token()}}
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Categoría</label>
                                    <p>
                                    <select name="idcategoria" class="form-control">
                                        @foreach ($categories as $cat)
                                        <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                                        @endforeach
                                    </select>
                                </p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="codigo">Código</label>
                                    <input type="text" name="codigo" required value="{{old('codigo')}}" class="form-control" placeholder="Codigo">
                                  
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" name="stock" required value="{{old('stock')}}" class="form-control" placeholder="Stock del artículo">
                                   
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text"  name="descripcion"  value="{{old('descripcion')}}" class="form-control" placeholder="Descripción"> 
                                 
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="number" name="precio" required value="{{old('precio')}}" class="form-control" placeholder="Precio" min="0" step="any"> 
                                 
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <input type="file" name="imagen"  class="form-control" > 
                                   
                                </div>
                            </div>
                            <!--div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="imagen">Galería</label>
                                   
                                   
                                </div>
                            </div-->
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
            
@endsection