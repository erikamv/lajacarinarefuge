@extends('admin.master')
@section('tittle', 'Patrocinador')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Solicitudes</a>
</li>
<li class="active">
    <a href="{{url('/admin/collaborators/all')}}" class="nav-link" style="color: #828860; font-size: 18px;">Patrocinador</a>
</li>
@endsection

@section('contenido')


                    <div class="panel panel-body ">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <h3>Formularios de Patrocinador</h3>
                                <div class="panel  ">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-block dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%"> 
                                                <i class="fa fa-filter"></i> Filtrar</button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{url('/admin/collaborators/all')}}"> <h4><i class="fa fa-list"></i> Todos</h4></a> 
                                                    <a class="dropdown-item" href="{{url('/admin/collaborators/0')}}"> <h4><i class="fa fa-unlink"></i> Registrados</h4></a>
                                                    <a class="dropdown-item" href="{{url('/admin/collaborators/1')}}"> <h4><i class="fa fa-user-check"></i> Activos</h4></a>
                                                    <a class="dropdown-item" href="{{url('/admin/collaborators/2')}}"> <h4><i class="fa fa-heart-broken"></i> Descartados</h4></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                                            @include('admin.collaborators.search')
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
                                            <th>Empresa</th>
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
                                        @foreach ($collaborator as $col)
                                        <tr >
                                            <td>{{$col->idcolaborador}}</td>
                                            <td>{{$col->empresa}}</td>
                                            <td>{{$col->direccion}}</td>
                                            <td>{{$col->email}}</td>
                                            <td>{{$col->telefono}}</td>
                                            <td>{{$col->observaciones}}</td>
                                            <td>{{$col->fechaInicio}}</td>
                                            <td>{{$col->fechaFin}}</td>
                                            <td>{{getStatusHelpArray(null,$col->estado)}}</td>
                                            <td>
                                                @if(kvfj(Auth::user()->permissions, 'collaboratorEdit'))
                                                <a href="{{url('/admin/collaborators/'.$col->idcolaborador.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Editar"><button class="btn btn-primary">
                                                    <i class="fa fa-folder-open"><span> </span></i></button>
                                                </a>
                                                @endif

                                               @if(kvfj(Auth::user()->permissions, 'collaboratorDelete'))
                                                <a href="" data-object="{{$col->idcolaborador}}"  data-path="admin/collaborators" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-deleted" type="submit"><button class="btn btn-danger">
                                                    <i class="fa fa-trash-alt"> <span></span></i></button>
                                                </a>
                                                @endif

                                                @if(kvfj(Auth::user()->permissions, 'collaboratorActive'))
                                                <a href="{{url('/admin/collaborators/'.$col->idcolaborador.'/active')}}" data-toggle="tooltip" data-placement="top" title="Aprobar"><button class="btn btn-success">
                                                    <i class="fa fa-check-square"><span> </span></i></button>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                        @endforeach
                                    </table>
                                </div>
                                {{$collaborator -> render()}}
                            </div>
                        </div>
                    </div>
                
@endsection