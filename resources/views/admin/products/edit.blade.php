@extends('admin.master')
@section('tittle', 'Editar artículo')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Tienda</a>
</li>
<li class="active">
    <a  href="{{url('/admin/products')}}" style="color: #828860; font-size: 18px;">Productos</a>
</li>
<li class="active">
    <a href="{{url('/admin/products/edit')}}" class="nav-link" style="color: #828860; font-size: 18px;">Editar artículo</a>
</li>
@endsection
@section ('contenido')
<div class="col-xs-12 col-md-12 col-lg-12 ">
    <div class="panel panel-body ">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar artículo: {{$articulo->nombre}}</h3>
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

    {!!Form::open(array('url'=>'/admin/products/'.$articulo->idarticulo.'/edit', 'method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

            
    {{Form::token()}}
        <div class="row">
            <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" required value="{{$articulo->nombre}}" class="form-control" >
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Categoría</label>
                        <p>
                        <select name="idcategoria" class="form-control">
                            @foreach ($categories as $cat)
                                @if ($cat->idcategoria==$articulo->idcategoria)
                                <option value="{{$cat->idcategoria}}" selectec>{{$cat->nombre}}</option>
                                @else
                                <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </p>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input type="text" name="codigo" required value="{{$articulo->codigo}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" required value="{{$articulo->stock}}" class="form-control" >
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion"  value="{{$articulo->descripcion}}" class="form-control" placeholder="Descripción"> 
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" required value="{{$articulo->precio}}" class="form-control" > 
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="esatado">Estado</label>
                        {!! Form::select('estado', ['Activo'=>'Activo', 'Inactivo'=>'Inactivo', 'Mantenimiento'=>'Mantenimiento'], $articulo->estado, ['required', 'class'=>'form-control'])!!}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen" class="form-control" >
                        @if (($articulo->imagen)!="")
                        <a href="{{url('/static/imagenes/articulos/'.$articulo->imagen)}}" data-fancybox="gallery">
                            <img src="{{url('/static/imagenes/articulos/'.$articulo->imagen)}}" alt="" heigth="100px" width="100px">
                        </a>
                        @endif 
                    </div>
                    {!!Form::close()!!}

                    <div class="form-group">
                        <label for="file_image">Galería</label>
                        {!!Form::open(['url'=>'/admin/products/'.$articulo->idarticulo.'/gallery/add', 'method'=>'POST','autocomplete'=>'off','files'=>'true', 'id'=>'form_product_gallery'])!!}
                        
                        {!! Form::close() !!}
                        <!--div class="btn-submit">
                            <br>
                            <a href="" id="btn_product_file_image"><i class="fa fa-plus-square-o fa-3x" ></i></a>
                        </div-->
                        @if(kvfj(Auth::user()->permissions, 'productsGallery'))
                        {!!Form::open(array('url'=>'/admin/products/'.$articulo->idarticulo.'/gallery/add', 'method'=>'POST','autocomplete'=>'off','files'=>'true', 'id'=>'form_product_gallery'))!!}
                        <div class="thumbs">
                            
                            {!! Form::file('file_name', ['id' => 'product_file_image', 'accept'=> 'image/*',  'required']) !!}
                            @foreach ($images as $img)
                            @if ($img->idarticulo==$articulo->idarticulo)
                                <div class="thumb">
                                    <a href="{{url('/static/imagenes/articulos/galeria/'.$img->file_name)}}" data-fancybox="gallery">
                                        <img src="{{url('/static/imagenes/articulos/galeria/'.$img->file_name)}}" alt="" heigth="100px" width="100px">
                                    </a>
                                    <a href="{{url('/admin/products/'.$articulo->idarticulo.'/'.$img->id.'/delete')}}" data-toggle="tooltip" data-placement="top" title="Eliminar"><button class="btn btn-primary">
                                        <i class="fa fa-trash-alt"><span> </span></i></button>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                        </div>
                        {!! Form::close() !!}
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
</div>        


           
            
        
@endsection