@extends('emails.master')
@section('contenido')
<p>Hola: <strong>{{$name}} {{$lastname}}</strong></p>
<p>La contraseña ha sido restablecida, tu nueva contraseña es:  <h2>{{$password}}</h2></p>
<p>Has click en el siguiente enlace para iniciar sesión.</p>
<p ><h4><a href="{{url('/login')}}" style="display: inline-block; background-color: #6c6874; color: #fff; padding:12px;
border-radius:4px; text-decoration:none">Resetear mi contraseña</a></h4></p>
<p>Si el enlace no funciona, copie la siguiente dirección en su navegador: </p>
<p>{{url('/login')}}</p>

@endsection