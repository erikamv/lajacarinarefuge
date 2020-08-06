@extends('emails.master')
@section('contenido')
<p>Hola: <strong>{{$name}} {{$lastname}}</strong></p>
<p>Estamos encantados de que desees formar parte de nuestra comunidad. </p>
<p>Para activar tu nueva cuenta haz click en el siguiente enlace: </p>

<p><h4><a href="{{url('/confirmation?code='.$confirmation_code})}}" style="display: inline-block; background-color: #6c6874; color: #fff; padding:12px;
border-radius:4px; text-decoration:none">Click para confirmar tu email</a></h4></p>
<p>Si el enlace no funciona, copie la siguiente dirección en su navegador: </p>
<p>{{url('/confirmation?code='.$confirmation_code)}}</p>

@endsection