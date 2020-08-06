@extends('master')
@section('tittle', 'Perfil')
@section('style')
<link href="{{asset('/static/css/bootstrapInicio.css')}}" rel="stylesheet">
@section('contenido')

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="/static/css/account.css">
<hr>
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card hovercard">
                <div class="cardheader">
                    <img src="{{asset('/static/imagenes/refugio1.png')}}" alt="">
                </div>
                <div class="avatar">
                    <img src="{{asset('/static/imagenes/usuarios/'.Auth::user()->avatar)}}" alt="{{Auth::user()->name}}" height="250">
                </div>
                <div class="panel panel-body" style="text-align: left; padding-left: 150px; padding-right: 150px">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p><label for="user"><i class="fa fa-angle-right"></i><strong> Nombre:</strong></label>
                                {{Auth::user()->name}} {{Auth::user()->lastname}}
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p><label for="phone"><i class="fa fa-angle-right"></i><strong> Contacto:</strong> </label>
                                {{Auth::user()->phone}}
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p><label for="email"> <i class="fa fa-angle-right"></i><strong> Correo electrónico:</strong> </label>
                                {{Auth::user()->email}}
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p><label for="gender"><i class="fa fa-angle-right"></i><strong> Sexo:</strong> </label>
                                {{Auth::user()->gender}}
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p><label for="gender"><i class="fa fa-angle-right"></i><strong> Fecha de inicio:</strong> </label>
                                {{Auth::user()->created_at}}
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p><label for="birthday"><i class="fa fa-angle-right"></i><strong> Fecha de nacimiento:</strong> </label>
                                {{Auth::user()->birthday}}
                            </p>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <a href="{{url('/account/edit')}}"><button class=" btn-dark btn-block" type="submit"><i class="fa fa-user-edit"></i> Editar perfil</button>
                            </a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <p style="text-align: center"><h2>Historial de Usuario {{Auth::user()->name}} {{Auth::user()->lastname}}</p></h2>
            </div>
            <div class="card hovercard">
                <div class="row">
                    
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <br><br>
                            <h3>Adopciones</h3>
                            <div class="pane panel body">
                                <u>
                                    <li>Adoptado 1</li>
                                </u>
                            </div>
                            <br><br>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <br><br>
                            <h3>Apadrinados</h3>
                            <div class="pane panel body">
                                <u>
                                    <li>Adoptado 1</li>
                                </u>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <br><br>
                            <h3>Órdenes de compra</h3>
                            <div class="pane panel body">
                                <u>
                                    <li>Adoptado 1</li>
                                </u>
                            </div><br><br>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <br><br>
                            <h3>Articulos comprados</h3>
                            <div class="pane panel body">
                                <u>
                                    <li>Adoptado 1</li>
                                </u>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</div>
@endsection