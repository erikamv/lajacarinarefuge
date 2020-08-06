@extends('admin.master')
@section('tittle', 'Animales')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Refugio</a>
</li>
<li class="active">
    <a href="{{url('/admin/animals')}}" class="nav-link" style="color: #828860; font-size: 18px;">Animales</a>
</li>
@endsection

@section('contenido')


                    <div class="panel panel-body ">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <h3>Listado de Animales 
                                    @if(kvfj(Auth::user()->permissions, 'animalsAdd'))
                                    <a href="/admin/animals/add"> <button class="btn btn-link"> Agregar</button>
                                    </a>
                                    @endif
                                </h3>
                                @include('admin.animals.search')
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                        <thead>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Edad</th>
                                            <th>Sexo</th>
                                            <th>Imagen</th>
                                            <th>Peso</th>
                                            <th>Raza</th>
                                            <th>Vacunas</th>
                                            <th>Esterilizacion</th>
                                         
                                            <th>Estado</th>
                                            <th>Opciones</th>
                                        </thead>
                                        @foreach ($animals as $an)
                                        <tr>
                                            <td>{{$an->idanimal}}</td>
                                            <td>{{$an->nombre}}</td>
                                            <td>{{$an->edad}}</td>
                                            <td>{{getStatusSexArray(null,$an->sexo)}}</td>
                        
                                            <td>
                                                <a href="{{url('/static/imagenes/animales/'.$an->imagen)}}" data-fancybox="gallery"><img src="{{asset('/static/imagenes/animales/'.$an->imagen)}}" alt="{{$an->nombre}}" heigth="80px" width="80px" class="img-thumbnail"></a>
                                            </td>
                                            
                                            <td>{{$an->peso}} libras</td>
                                            <td>{{getStatusSizeArray(null,$an->tamanio)}}</td>
                                            <td>{{getStatusArray(null,$an->vacunas)}}</td>
                                            <td>{{getStatusArray(null,$an->esterilizacion)}}</td>
                                            
                                            <td>{{getStatusAnimalArray(null,$an->estado)}}</td>
                                            <td>
                                                @if(kvfj(Auth::user()->permissions, 'animalsEdit'))
                                                <a href="{{url('/admin/animals/'.$an->idanimal.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Editar"><button class="btn btn-primary">
                                                    <i class="fa fa-edit"><span> </span></i></button>
                                                </a>
                                                @endif

                                                @if(kvfj(Auth::user()->permissions, 'animalsDelete'))
                                                <a href="" data-object="{{$an->idanimal}}"  data-path="admin/animals" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-deleted" type="submit"><button class="btn btn-danger">
                                                    <i class="fa fa-trash-alt"> <span></span></i></button>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @include('/admin/animals.modal')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
@endsection