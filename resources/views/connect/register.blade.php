@extends('connect.master')

@section('tittle', 'Registo')

@section('content')

<section id="about">
    <div class="container">
        <div class="about-col ">
            <header>
            <h2>Registrate con correo electrónico</h2>
            </header>
            <fieldset>
                
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                @if (count($errors)>0)
                                <div class="alert alert-danger" style="text-align: left">
                                    <ul>@foreach ($errors -> all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if (session('status'))
                                <div class="alert alert-success" style="text-align: center">
                                    {{ session('status') }}
                                </div>
                                @endif
                            </div>
                            {!! Form::open (['url' => '/register'])!!}
                            <div class="input-group">
                                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder'=>'Nombre']) !!}
                            </div>
                            <div class="input-group">
                                {!! Form::text('lastname', null, ['class' => 'form-control', 'required', 'placeholder'=>'Apellido']) !!}
                            </div>
                            <div class="input-group">
                                {!! Form::email('email', null, ['class' => 'form-control', 'required', 'placeholder'=>'Correo electrónico']) !!}
                            </div>
                            <div class="input-group">
                                {!! Form::password('password', ['class' => 'form-control', 'required', 'placeholder'=>'Contraseña']) !!}
                            </div>
                            <div class="input-group">
                                {!! Form::password('cpassword', ['class' => 'form-control', 'required', 'placeholder'=>'Confirmar contraseña']) !!}
                            </div>
                            <br><br>
                            {!! Form::submit('Registrarse', ['class'=>' btn btn-adopta']) !!}
                            {!! Form::close() !!}
                            <div class="pt-4" style="text-align: center;">
                                <label for="cuenta">Ya tienes una cuenta.<a href="{{url('/login')}}"> Ingresa aquí.</a></label><br>
                            </div>
                        </div>
                        
                    </div>
               
            </fieldset>
        </div>
    </div>
</section> <!--Fin información personal-->        

@endsection
