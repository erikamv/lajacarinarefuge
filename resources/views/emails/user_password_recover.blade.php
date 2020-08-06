@extends('emails.master')
@section('contenido')
<p>Hola: <strong>{{$name}} {{$lastname}}</strong></p>
<p>Este correo electrónico le ayudará a restablecer la contraseña de su cuenta en nuestra plataforma. </p>
<p>Para continuar haga click en el siguiente enlace e ingrese el código adjunto: <h2>{{$code}}</h2></p>
<p><h4><a href="{{url('/reset?email='.$email)}}" style="display: inline-block; background-color: #6c6874; color: #fff; padding:12px;
border-radius:4px; text-decoration:none">Resetear mi contraseña</a></h4></p>
<p>Si el enlace no funciona, copie la siguiente dirección en su navegador: </p>
<p>{{url('/reset?email='.$email)}}</p>

@endsection