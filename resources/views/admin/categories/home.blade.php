@extends('admin.master')
@section('tittle', 'Categorías')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Tienda</a>
</li>
<li class="active">
    <a href="{{url('/admin/categories')}}" class="nav-link" style="color: #828860; font-size: 18px;">Categorías</a>
</li>
@endsection

@section('contenido')

                    <div class="panel panel-body ">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <h3>Listado de Categorías 
                                    @if(kvfj(Auth::user()->permissions, 'categoriesAdd'))
                                    <a href="/admin/categories/add"> <button class="btn btn-link"> Agregar</button>
                                    </a>
                                    @endif
                                </h3>
                                @include('admin.categories.search')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                        <thead>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Opciones</th>
                                        </thead>
                                        @foreach ($categories as $cat)
                                        <tr>
                                            <td>{{$cat->idcategoria}}</td>
                                            <td>{{$cat->nombre}}</td>
                                            <td>{{$cat->descripcion}}</td>
                                            <td>
                                                @if(kvfj(Auth::user()->permissions, 'categoriesEdit'))
                                                <a href="{{url('/admin/categories/'.$cat->idcategoria.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Editar"><button class="btn btn-primary">
                                                    <i class="fa fa-edit"><span> </span></i></button>
                                                </a>
                                                @endif
                                                
                                                @if(kvfj(Auth::user()->permissions, 'categoriesDelete'))
                                                <a href="" data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal" data-placement="top" title="Eliminar"><button class="btn btn-danger">
                                                    <i class="fa fa-trash-alt"> <span> </span></i></button>
                                                </a>
                                                @endif
                                                    
                                            </td>
                                        </tr>
                                        @include('/admin/categories.modal')
                                        @endforeach
                                    </table>
                                </div>
                                {{$categories -> render()}}
                            </div>
                        </div>
                    </div>
                             
@endsection