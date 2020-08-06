@extends('admin.master')
@section('tittle', 'Permisos de usuario')
@section('breadcrumb')

<li class="active">
    <a  href="{{url('/admin/users/all')}}" style="color: #828860; font-size: 18px;">Usuarios</a>
</li>
<li class="active">
    <a href="{{url('/admin/users/all')}}" class="nav-link" style="color: #828860; font-size: 18px;">Permisos de usuario</a>
</li>
@endsection
@section ('contenido')
<div class="col-xs-12 col-md-12 col-lg-12 ">
    <div class="panel panel-body ">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 ">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <p><h1>  Permisos de Usuario </h1>  </p>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <p><h3><i class="fa fa-id-card"></i> Usuario: <strong>  {{$users->name}} {{$users->lastname}} </strong></h3>  </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 offset-md-10">
                    <p><h3><i class="fa fa-list-ol"></i> Identificador:<strong> # 000{{$users->id}}</strong> </h3> </p>
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
                
            </div>
        </div>
        
        <div class="col-xs-12 col-md-12 col-lg-12 ">
            <div class="panel panel-body ">
                <form action="{{url('/admin/users/'.$users->id.'/permissions')}}" method="POST">
                    @csrf
                    <div class="row">
                        @include('admin.users.userPermissions.moduleDashboard')
                        @include('admin.users.userPermissions.moduleUsers')
                        @include('admin.users.userPermissions.moduleProducts')
                        @include('admin.users.userPermissions.moduleCategories')
                        @include('admin.users.userPermissions.moduleAnimals')
                        @include('admin.users.userPermissions.modulePublications')
                        @include('admin.users.userPermissions.moduleVolunteers')
                        @include('admin.users.userPermissions.moduleHomes')
                        @include('admin.users.userPermissions.moduleCollaborators')
                        @include('admin.users.userPermissions.moduleAdoptions')
                        
                    </div>
                    <div >
                        <input type="submit" value="Guardar" class="btn btn-primary btn-block btn-lg">
                    </div>
                </form>
            </div> 
        </div> 
                    

    </div>      
</div>


    
@endsection