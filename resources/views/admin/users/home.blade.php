@extends('admin.master')
@section('tittle', 'Usuarios')
@section('breadcrumb')
<li class="active">
    <a href="{{url('/admin/users/all')}}" class="nav-link" style="color: #828860; font-size: 18px;">Usuarios</a>
</li>
@endsection

@section('contenido')


                    <div class="panel panel-body ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h3>Listado de Usuarios</h3>
                            
                                <div class="panel  ">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-block dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%"> 
                                                <i class="fa fa-filter"></i> Filtrar</button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{url('/admin/users/all')}}"> <h4><i class="fa fa-list"></i> Todos</h4></a> 
                                                    <a class="dropdown-item" href="{{url('/admin/users/1')}}"> <h4><i class="fa fa-user-check"></i> Verificados</h4></a>
                                                    <a class="dropdown-item" href="{{url('/admin/users/0')}}"> <h4><i class="fa fa-unlink"></i> No verificados</h4></a>
                                                    <a class="dropdown-item" href="{{url('/admin/users/100')}}"> <h4><i class="fa fa-heart-broken"></i> Suspendidos</h4></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                                            @include('admin.users.search')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                        <thead>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>Rol</th>
                                            <th>Estado</th>
                                            <th>Opciones</th>
                                        </thead>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->lastname}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{getRoleUserArray(null,$user->role)}}</td>
                                            <td>{{getStatusUserArray(null,$user->status)}}</td>
                                            
                                            <td>
                                                @if(kvfj(Auth::user()->permissions, 'usersEdit'))
                                                <a href="{{url('admin/users/'.$user->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Editar"><button class="btn btn-primary">
                                                    <i class="fa fa-edit"><span> </span></i></button>
                                                </a>
                                                @endif
                                                @if(kvfj(Auth::user()->permissions, 'usersPermissions'))
                                                <a href="{{url('admin/users/'.$user->id.'/permissions')}}" data-toggle="tooltip" data-placement="top" title="Permisos de usuario"><button class="btn btn-dark">
                                                    <i class="fa fa-cogs"><span> </span></i></button>
                                                </a>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                       
                                        @endforeach
                                    </table>
                                </div>
                                {{$users -> render()}}
                            </div>
                        </div>
                    </div>
                
@endsection