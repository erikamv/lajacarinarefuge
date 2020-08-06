@extends('admin.master')
@section('tittle', 'Adopciones')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Solicitudes</a>
</li>
<li class="active">
    <a href="{{url('/admin/adoptions/all')}}" class="nav-link" style="color: #828860; font-size: 18px;">Adopciones</a>
</li>
@endsection

@section('contenido')


                    <div class="panel panel-body ">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <h3>Formularios de Adopciones</h3>
                                <div class="panel  ">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-block dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%"> 
                                                <i class="fa fa-filter"></i> Filtrar</button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{url('/admin/adoptions/all')}}"> <h4><i class="fa fa-list"></i> Todos</h4></a> 
                                                    <a class="dropdown-item" href="{{url('/admin/adoptions/0')}}"> <h4><i class="fa fa-unlink"></i> Registrados</h4></a>
                                                    <a class="dropdown-item" href="{{url('/admin/adoptions/1')}}"> <h4><i class="fa fa-user-check"></i> Activos</h4></a>
                                                    <a class="dropdown-item" href="{{url('/admin/adoptions/2')}}"> <h4><i class="fa fa-heart-broken"></i> Descartados</h4></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                                            @include('admin.adoptions.search')
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
                                            <th>Familia</th>
                                            <th>Propiedad</th>
                                            <th>Razon</th>
                                            <th>Lugar</th>
                                            <th>Observaciones</th>
                                            <th>Fecha de adopción</th>
                                            <th>Estado</th>
                                            <th>Opciones</th>
                                        </thead>
                                        <tbody>
                                        @foreach ($adopcion as $adopt)
                                        <tr >
                                            <td>{{$adopt->idvoluntario}}</td>
                                            <td>{{$adopt->nombre}}</td>
                                            <td>{{$adopt->apellido}}</td>
                                            <td>{{$adopt->fechaNacimiento}}</td>
                                            <td>{{$adopt->ciudad}}</td>
                                            <td>{{$adopt->direccion}}</td>
                                            <td>{{$adopt->email}}</td>
                                            <td>{{$adopt->telefono}}</td>
                                            <td>{{$adopt->familia}}</td>
                                            <td>{{$adopt->propiedad}}</td>
                                            <td>{{$adopt->porque}}</td>
                                            <td>{{$adopt->lugar}}</td>
                                            <td>{{$adopt->observaciones}}</td>
                                            <td>{{$adopt->fechaAdopcion}}</td>
                                            <td>{{getStatusHelpArray(null,$vol->estado)}}</td>
                                            <td>
                                                @if(kvfj(Auth::user()->permissions, 'adoptionEdit'))
                                                <a href="{{url('/admin/adoptions/'.$adopt->idadoptante.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Editar"><button class="btn btn-primary">
                                                    <i class="fa fa-folder-open"><span> </span></i></button>
                                                </a>
                                                @endif

                                               @if(kvfj(Auth::user()->permissions, 'adoptionDelete'))
                                                <a href="" data-object="{{$adopt->idadoptante}}"  data-path="admin/volunteers" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-deleted" type="submit"><button class="btn btn-danger">
                                                    <i class="fa fa-trash-alt"> <span></span></i></button>
                                                </a>
                                                @endif

                                                @if(kvfj(Auth::user()->permissions, 'adoptionActive'))
                                                <a href="{{url('/admin/adoptions/'.$adopt->idadoptante.'/active')}}" data-toggle="tooltip" data-placement="top" title="Aprobar"><button class="btn btn-success">
                                                    <i class="fa fa-check-square"><span> </span></i></button>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                        @endforeach
                                    </table>
                                </div>
                                {{$adopcion -> render()}}
                            </div>
                        </div>
                    </div>
                
@endsection