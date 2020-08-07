@extends('admin.master')
@section('tittle', 'Artículos')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Tienda</a>
</li>
<li class="active">
    <a href="{{url('/admin/products/1')}}" class="nav-link" style="color: #828860; font-size: 18px;">Artículos</a>
</li>
@endsection

@section('contenido')
                    <div class="panel panel-body ">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <h3>Listado de Artículos 
                                    @if(kvfj(Auth::user()->permissions, 'productsAdd'))
                                    <a href="/admin/products/add/product"> <button class="btn btn-link"> Agregar</button></a>
                                    @endif
                                </h3>
                                <div class="panel  ">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-block dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%"> 
                                                <i class="fa fa-filter"></i> Filtrar</button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{url('/admin/products/all')}}"> <h4><i class="fa fa-list"></i> Todos</h4></a> 
                                                    <a class="dropdown-item" href="{{url('/admin/products/0')}}"> <h4><i class="fa fa-unlink"></i> En manteniento</h4></a>
                                                    <a class="dropdown-item" href="{{url('/admin/products/1')}}"> <h4><i class="fa fa-user-check"></i> Activos</h4></a>
                                                    <a class="dropdown-item" href="{{url('/admin/products/2')}}"> <h4><i class="fa fa-heart-broken"></i> Eliminados</h4></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                                            @include('admin.products.search')
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                            @if (count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors -> all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="mtop16">
                                @if (session('status'))
                                <div class="alert alert-success" style="text-align: center">
                                    {{ session('status') }}
                                </div>
                                @endif
                                @if (session('alert'))
                                <div class="alert alert-danger" style="text-align: center">
                                    {{ session('alert') }}
                                </div>
                                @endif
                            </div>
                        
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                        <thead>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Codigo</th>
                                            <th>Categoria</th>
                                            <th>Descripción</th>
                                            <th>Stock</th>
                                            <th>Precio</th>
                                            <th>Imagen</th>
                                            <th>Estado</th>
                                            <th>Opciones</th>
                                        </thead>
                                        <tbody>
                                        @foreach ($articulos as $art)
                                        <tr >
                                            <td>{{$art->idarticulo}}</td>
                                            <td>{{$art->nombre}}</td>
                                            <td>{{$art->codigo}}</td>
                                            <td>{{$art->categoria}}</td>
                                            <td>{{$art->descripcion}}</td>
                                            <td>{{$art->stock}}</td>
                                            <td>{{$art->precio}}</td>
                                            <td>
                                                <a href="{{url('/static/imagenes/articulos/'.$art->imagen)}}" data-fancybox="gallery"><img src="{{asset('/static/imagenes/articulos/'.$art->imagen)}}" alt="{{$art->nombre}}" heigth="80px" width="80px"></a>
                                                
                                            </td>
                                            <td>{{$art->estado}}</td>
                                            <td>
                                                @if(kvfj(Auth::user()->permissions, 'productsEdit'))
                                                <a href="{{url('/admin/products/'.$art->idarticulo.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Editar"><button class="btn btn-primary">
                                                    <i class="fa fa-edit"><span> </span></i></button>
                                                </a>
                                                @endif

                                                @if(kvfj(Auth::user()->permissions, 'productsDelete'))
                                                <a href="" data-object="{{$art->idarticulo}}"  data-path="admin/products" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-deleted" type="submit"><button class="btn btn-danger">
                                                    <i class="fa fa-trash-alt"> <span></span></i></button>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                        @include('/admin/products.modal')
                                        @endforeach
                                    </table>
                                </div>
                                {{$articulos -> render()}}
                            </div>
                        </div>
                    </div>
                
@endsection