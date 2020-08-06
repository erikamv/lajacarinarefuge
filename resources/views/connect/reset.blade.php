@extends('connect.master')

@section('tittle', 'Recuperar contraseña')

@section('content')

<section id="about">
    <div class="container">
        <div class="about-col ">
            <header>
            <h2>Recuperar contraseña</h2>
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
                                @if (session('alert'))
                                <div class="alert alert-danger" style="text-align: center">
                                    {{ session('alert') }}
                                </div>
                                @endif
                            </div>
                            {!! Form::open (['url' => '/reset'])!!}
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam, nobis debitis beatae cum, temporibus quia nulla, neque illo voluptates voluptatibus soluta. Exercitationem accusamus molestias quos beatae ipsa enim, esse iste.</p>
                            <div class="input-group">
                                {!! Form::email('email', $email, ['class' => 'form-control', 'required', 'placeholder'=>'Correo electrónico']) !!}
                            </div>
                            <div class="input-group">
                                {!! Form::number('code', null, ['class' => 'form-control', 'required', 'placeholder'=>'Código de recuperación']) !!}
                            </div>
                            <br><br>
                            {!! Form::submit('Enviar contraseña', ['class'=>' btn btn-adopta']) !!}
                            {!! Form::close() !!}
                            <div class="pt-4" style="text-align: center;">
                                <label for="cuenta">Ya tienes una cuenta.<a href="{{url('/login')}}"> Ingresa aquí.</a></label><br>
                                <label for="cuenta">Aún no tienes una cuenta.<a href="{{url('/register')}}"> Registrate aquí.</a></label><br>
                            </div>
                            
                        </div>
                        
                    </div>
               
            </fieldset>
        </div>
    </div>
</section> <!--Fin información personal-->        

@endsection
