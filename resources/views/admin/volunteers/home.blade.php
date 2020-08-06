@extends('admin.master')
@section('tittle', 'Voluntarios')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Solicitudes</a>
</li>
<li class="active">
    <a href="{{url('/admin/volunteers/all')}}" class="nav-link" style="color: #828860; font-size: 18px;">Voluntariado</a>
</li>
@endsection

@section('contenido')


                    <div class="panel panel-body ">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <h3>Formularios de Voluntariado</h3>
                                <div class="panel  ">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-block dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%"> 
                                                <i class="fa fa-filter"></i> Filtrar</button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{url('/admin/volunteers/all')}}"> <h4><i class="fa fa-list"></i> Todos</h4></a> 
                                                    <a class="dropdown-item" href="{{url('/admin/volunteers/0')}}"> <h4><i class="fa fa-unlink"></i> Registrados</h4></a>
                                                    <a class="dropdown-item" href="{{url('/admin/volunteers/1')}}"> <h4><i class="fa fa-user-check"></i> Activos</h4></a>
                                                    <a class="dropdown-item" href="{{url('/admin/volunteers/2')}}"> <h4><i class="fa fa-heart-broken"></i> Descartados</h4></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                                            @include('admin.volunteers.search')
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
                                            <th>Apellido</th>
                                            <th>Fecha de nacimiento</th>
                                            <th>Ciudad</th>
                                            <th>Dirección</th>
                                            <th>Correo electrónico</th>
                                            <th>Contacto</th>
                                            <th>Observaciones</th>
                                            <th>Fecha inicio</th>
                                            <th>Fecha fin</th>
                                            <th>Estado</th>
                                            <th>Opciones</th>
                                        </thead>
                                        <tbody>
                                        @foreach ($voluntarios as $vol)
                                        <tr >
                                            <td>{{$vol->idvoluntario}}</td>
                                            <td>{{$vol->nombre}}</td>
                                            <td>{{$vol->apellido}}</td>
                                            <td>{{$vol->fechaNacimiento}}</td>
                                            <td>{{$vol->ciudad}}</td>
                                            <td>{{$vol->direccion}}</td>
                                            <td>{{$vol->email}}</td>
                                            <td>{{$vol->telefono}}</td>
                                            <td>{{$vol->observaciones}}</td>
                                            <td>{{$vol->fechaInicio}}</td>
                                            <td>{{$vol->fechaFin}}</td>
                                            <td>{{getStatusHelpArray(null,$vol->estado)}}</td>
                                            <td>
                                                @if(kvfj(Auth::user()->permissions, 'volunteerEdit'))
                                                <a href="{{url('/admin/volunteers/'.$vol->idvoluntario.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Editar"><button class="btn btn-primary">
                                                    <i class="fa fa-folder-open"><span> </span></i></button>
                                                </a>
                                                @endif

                                               @if(kvfj(Auth::user()->permissions, 'volunteerDelete'))
                                                <a href="" data-object="{{$vol->idvoluntario}}"  data-path="admin/volunteers" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-deleted" type="submit"><button class="btn btn-danger">
                                                    <i class="fa fa-trash-alt"> <span></span></i></button>
                                                </a>
                                                @endif

                                                @if(kvfj(Auth::user()->permissions, 'volunteerActive'))
                                                <a href="{{url('/admin/volunteers/'.$vol->idvoluntario.'/active')}}" data-toggle="tooltip" data-placement="top" title="Aprobar"><button class="btn btn-success">
                                                    <i class="fa fa-check-square"><span> </span></i></button>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                        @endforeach
                                    </table>
                                </div>
                                {{$voluntarios -> render()}}
                            </div>
                        </div>
                    </div>
                
@endsection