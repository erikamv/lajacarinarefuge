@extends('connect.master')

@section('tittle', 'Confirmación de correo')

@section('content')

<section id="about">
    <div class="container">
        <div class="about-col ">
            <header>
            <h2>Verificacion de correo electrónico</h2>
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

                            <div class="panel">
                                <div class="container">
                                    <p>Su cuenta ha sido creada, para iniciar sesión por favor confirme el link de activación
                                        enviado a su correo electrónico.</p>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
            </fieldset>
        </div>
    </div>
    <br><br>
</section> <!--Fin información personal-->        

@endsection
