@extends('master')
@section('tittle', 'Quiénes somos')
@section('style')
<link href="/static/css/bootstrapWho.css" rel="stylesheet">
@section('contenido')
       <!--Foto-->
       <section id="foto">
        <img src="/static/imagenes/Diseño sin título.png" alt="" class="w-100">
      </section>
      <section id="about">
        <div class="container">
          <header class="section-header pt-5">
            <h2>Quiénes Somos</h2>
          </header>
          <div class="about-col">
            <p>
              Refugio La Jacarina somos un grupo de voluntarios que poseen un refugio que alberga cerca de 40 animalitos rescatados de la calle o de 
              alguna situación de maltrato. Nuestro objetivo a futuro es incrementar el apoyo de esta fundación para 
              realizar mejoras y dar una mejor vida a estos grandiosos animales.
            </p>
          </div>
          <div class="about-col pt-2">
            <h4>Nuestro Equipo</h4>
            <p>Un grupo de hombres y mujeres comprometidos que promueven la protección y el bienestar de los perritos callejeros 
              mediante acciones directas y la concienciación de la comunidad en el respeto que merecen y se debe tener 
              hacia las demás especies.</p>
          </div>
          <div class="equipo">
            <div class="about-col pt-4">
              <img src="/static/imagenes/Rescate1 (1).png" alt="" data-fancybox="gallery">
              <img src="/static/imagenes/Rescate.png" style="margin-left: 1.5rem;" alt="" data-fancybox="gallery">
              <img src="/static/imagenes/Rescatistas.png" style="margin-left: 1.5rem;" alt="" data-fancybox="gallery">
              <img src="/static/imagenes/Rescatando.png" style="margin-left: 1.5rem;" alt="" data-fancybox="gallery">
             </div>
          </div>
          <div class="about-col pt-5">
            <h4>Misión y Visión</h4>
            <p>Nuestra finalidad como emprendimiento social y como agente de cambio, es realizar una actividad que beneficie a la comunidad y
               producir cambios en la mentalidad de las personas. Lo hacemos atacando el grave problema de la sobre población de mascotas abandonadas 
               en nuestra ciudad -que trae aparejadas graves consecuencias sanitarias y extra sanitarias que nos afectan a todos- (accidentes del tránsito, 
               gastos en salud y ausentismo laboral causados por mordeduras y otras enfermedades, esparcimiento de basura en las calles, mala imagen país,
                entre otras), promoviendo la tenencia responsable de mascotas, promoviendo que sean tratados de manera ética y mediante campañas de esterilización 
                masiva. Involucrando a la comunidad -personas y empresas- mediante las redes sociales y otras vías, para invitarlos a ser parte de la solución, ofreciéndoles 
                diversas formas y oportunidades concretas y fáciles de cooperar, logrando de esta forma alcanzar metas más altas en rescates y re ubicaciones.</p>
          </div>
          <div class="about-col pt-4">
            <h4>Actividades</h4>
            <p>El refugio realiza eventos y actividades en las cuales colaboran con la sociedad y a su vez recaudan fondos para el mismo.
              Entre esas actividades estan:
            </p><br>
            <p>> Jornadas de Adopción</p>
            <p>> Campañas de Esterilización</p>
            <p>> Jornadas para Recepción de Donaciones</p>
            <p>> Vacunación</p><br>
          </div>
          <div class="about-col pt-3" style="text-align: center;">
            <img src="imagenes/Collage.png" alt="">
          </div>
              
      </section> <!--Fin información personal-->
@endsection
