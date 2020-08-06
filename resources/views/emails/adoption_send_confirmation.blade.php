@extends('emails.master')
@section('contenido')
<p>Hola: <strong>{{$nombre}} {{$apellido}}</strong></p>
<p>Este correo electrónico es para informarle que su formulario de adopción ha sido aprobado. </p>
<p>Por ello debe acercarse lo más pronto posible a nuestras instalaciones ubicadas en el sector Jacarrin o comunicarse a nuestros telefonos: </p>
<p>2 854 526 <br>098 566 5426</p>
<p>Para poder coordinar las condiciones y términos de la adopción.</p>
<p>Nos alegramos de que formes parte de nuestro equipo.</p>
<br>
<p>Atentamente.</p>
<p>Administración "La Jacarina"</p>
@endsection