@extends('admin.master')
@section('tittle', 'Editar usuario')
@section('breadcrumb')

<li class="active">
    <a  href="{{url('/admin/users/all')}}" style="color: #828860; font-size: 18px;">Usuarios</a>
</li>
<li class="active">
    <a href="{{url('/admin/users/edit')}}" class="nav-link" style="color: #828860; font-size: 18px;">Editar usuario</a>
</li>
@endsection
@section ('contenido')
<div class="col-xs-12 col-md-12 col-lg-12 ">
    <div class="panel panel-body ">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
               <h3>Usuario: {{$users->name}} {{$users->lastname}}</h3>
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

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="panel panel-body">
                <div class="header">
                    <h2 class="tittle"><i class="fa fa-user"></i>  Información de usuario: </h2>
                    <hr>
                </div>
                <div>
                  <p style="text-align: center">
                    @if(is_null($users->avatar))
                        <img src="{{url('/static/imagenes/usuario.png')}}" alt="{{$users->name}} {{$users->lastname}}" width="150px" height="150px" style="margin-block: center">
                    @else
                    <img src="{{url('/static/imagenes/usuarios/'.$users->id.'/'.$users->avatar)}}" alt="{{$users->name}} {{$users->lastname}}" width="100px" height="50px">
                    @endif
               </p> <hr> </div>
                <div >
                    <br>
                   <p style="text-align: center "><span class="tittle"><i class="fa fa-address-card"></i> <b> Nombre:</b> <br> {{$users->name}}</span>
                    <span class="tittle">{{$users->lastname}}</span></p> 
                    <br>
                    <p style="text-align: center"><span class="tittle"><i class="fa fa-envelope"></i> <b> Correo electrónico:</b>  <br> {{$users->email}}</span></p>
                    <br>
                    <p style="text-align: center"><span class="tittle"><i class="fa fa-calendar-alt"></i> <b> Fecha de registro:</b> <br> {{$users->created_at}}</span></p>
                    <br>
                    <p style="text-align: center"><span class="tittle"><i class="fa fa-user-tag"></i> <b> Rol del Usuario:</b> <br> {{getRoleUserArray(null,$users->role)}}</span></p>
                    <br>
                    <p style="text-align: center"><span class="tittle"><i class="fa fa-user-shield"></i> <b> Estado del Usuario:</b> <br> {{getStatusUserArray(null,$users->status)}} </span></p>
                </div>
                <br>
                @if(kvfj(Auth::user()->permissions, 'usersBanned'))
                    @if($users -> status == "100")
                        <a href="{{url('admin/users/'.$users->id.'/banned')}}" class="btn btn-success btn-block" >Activar usuario</a> 
                    @else
                        <a href="{{url('admin/users/'.$users->id.'/banned')}}" class="btn btn-danger btn-block" >Suspender usuario</a> 
                    @endif
                @endif
            </div>
        </div>
        @if(kvfj(Auth::user()->permissions, 'usersEdit'))
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-body">
                <div class="header">
                    <h2 class="tittle"><i class="fa fa-user-edit"></i>  Editar información </h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        {!! Form::open(['url' => '/admin/users/'.$users->id.'/edit']) !!}
                        <div class="form-group">
                            <label for="role">Tipo de usuario</label>
                            {!! Form::select ('role', getRoleUserArray('list', null), $users->role, ['class'=>'form-control']) !!}
                        </div>
                    
                    
                        <div class="form-group">
                            <label for="estado">Tipo de cuenta</label>
                            {!! Form::select ('status', getStatusUserArray('list', null), $users->status, ['class'=>'form-control', 'disabled']) !!}
                        </div>
                    </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                    {!! Form::close() !!}  
                </div>
            </div>
            </div>
        </div>
        @endif


            

    </div>      
</div>


    
@endsection