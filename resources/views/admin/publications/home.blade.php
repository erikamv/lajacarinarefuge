@extends('admin.master')
@section('tittle', 'Publicaciones')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Noticias</a>
</li>
<li class="active">
    <a href="{{url('/admin/publications')}}" class="nav-link" style="color: #828860; font-size: 18px;">Publicaciones</a>
</li>
@endsection

@section('contenido')

                    <div class="panel panel-body ">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <h3>Listado de Publicaciones 
                                    @if(kvfj(Auth::user()->permissions, 'publicationsAdd'))
                                    <a href="/admin/publications/add"> <button class="btn btn-link"> Agregar</button>
                                    </a> 
                                    @endif
                                </h3>
                                   
                                @include('admin.publications.search')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                        <thead>
                                            <th>#</th>
                                            <th>Título</th>
                                            <th>Contenido</th>
                                            <th>Tipo</th>
                                            <th>Autor</th>
                                            <th>Fecha</th>
                                            <th>Imagen</th>
                                            <th>Opciones</th>
                                        </thead>
                                        @foreach ($publication as $pub)
                                        <tr>
                                            <td>{{$pub->idpublicacion}}</td>
                                            <td>{{$pub->titulo}}</td>
                                            <td>{{$pub->contenido}}</td>
                                            <td>{{$pub->tipo}}</td>
                                            <td>{{$pub->autor}}</td>
                                            <td>{{$pub->fecha}}</td>
                                            
                                            <td>
                                                <a href="{{url('/static/imagenes/publicaciones/'.$pub->imagen)}}" data-fancybox="gallery"><img src="{{asset('/static/imagenes/publicaciones/'.$pub->imagen)}}" alt="{{$pub->titulo}}" heigth="80px" width="80px" ></a>
                                            </td>
                                           
                                            <td>
                                                @if(kvfj(Auth::user()->permissions, 'publicationsEdit'))
                                                <a href="{{url('/admin/publications/'.$pub->idpublicacion.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Editar"><button class="btn btn-primary">
                                                    <i class="fa fa-edit"><span> </span></i></button>
                                                </a>
                                                @endif

                                                @if(kvfj(Auth::user()->permissions, 'publicationsDelete'))
                                                <a href="" data-target="#modal-delete-{{$pub->idpublicacion}}"  data-toggle="modal" data-placement="top" title="Eliminar"><button class="btn btn-danger">
                                                    <i class="fa fa-trash-alt"> <span> </span></i></button>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @include('/admin/publications.modal')
                                        @endforeach
                                    </table>
                                </div>
                                {{$publication -> render()}}
                            </div>
                        </div>
                    </div>
@endsection