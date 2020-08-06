@extends('connect.master')

@section('tittle', 'Iniciar sesión')

@section('href', "/static/css/bootstrapLogin.css")

@section('content')

<section id="about">
    <div class="row vdivide">
        <div class="container">
            <div class="about-col pt-1">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <h2>Iniciar Sesión con correo electrónico</h2>
                        <div class="mtop16">
                            @if (session('status'))
                            <div class="alert alert-success" style="text-align: center">
                                {{ session('status') }}
                            </div>
                            @endif
                            @if (session('alert'))
                            <div class="alert alert-danger" style="text-align: center">
                                {{ session('alert') }}
                            </div>
                            @endif
                        </div>
                        <div class="mtop16">
                            @if (count($errors)>0)
                            <div class="alert alert-danger" style="text-align: left">
                                @foreach ($errors -> all() as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                             @endif
                        </div>
                        {!! Form::open (['url' => '/login'])!!}
                        <div class="input-group">
                            {!! Form::email('email', null, ['class' => 'form-control', 'required', 'placeholder'=>'Correo electrónico']) !!}
                        </div>
                        <div class="input-group">
                            {!! Form::password('password', ['class' => 'form-control', 'required', 'placeholder'=>'Contraseña']) !!}
                        </div> <br>
                        {!! Form::submit('Ingresar', ['class'=>'btn btn-adopta']) !!}
                        {!! Form::close() !!}
                        <div class="pt-4">
                            <label for="contraseña"><a href="{{url('/recover')}}">¿Olvidaste tu contraseña?</a></label><br>
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <h2>Ingresar con tu cuenta</h2>
                        <div class="boton pt-5" style="text-align: center;">
                            <button type="button" class="btn btn-facebook"><i class="fab fa-facebook-square"></i> Facebook</button>
                        </div>
                        <div class="boton pt-5" style="text-align: center;">
                            <button type="button" class="btn btn-gmail"><i class="fab fa-google"></i> Gmail</button>
                        </div>
                        <div class="pt-4">
                            <label for="cuenta">Aún no tienes una cuenta.<a href="{{url('/register')}}"> Registrate aquí.</a></label><br>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section> <!--Fin información personal-->

   
@endsection
