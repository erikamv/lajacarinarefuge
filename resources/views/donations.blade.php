@extends('master')
@section('tittle', 'Donaciones')
@section('style')
<link href="/static/css/bootstrapDonacion.css" rel="stylesheet">
@section('contenido')

<!--Foto-->
<section id="foto">
    <img src="/static/imagenes/donar.png" alt="" class="w-100">
  </section>
  <section id="about">
    <div class="container">
      <header class="section-header pt-5">
        <h2>Donaciones</h2>
      </header>
      <div class="about-col">
        <p>
          Sin tu ayuda no podríamos continuar con nuestra labor de rescatar, cuidar y dar en adopción todos los 
          animales que recogemos de las calles. Los gastos de alimentación, atención veterinaria y mantenimiento del 
          refugio son muy altos. Nuestra principales vías de financiación son las cuotas de los socios y las donaciones 
          que recibimos esporádicamente. Con tu ayuda mejorarás las condiciones de vida de los animales en el refugio y de 
          ella dependerá el número de animales a los que podamos salvar.
        </p>
      </div>
      <div class="about-col pt-3">
        <fieldset>
          <legend>Donativos monetarios</legend>
            <form role="form" id="form">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <h3>Donar con Paypal</h3>
                  <div class="pt-3" style="font-size: 1.1rem;">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                      <input type="hidden" name="cmd" value="_s-xclick">
                      <input type="hidden" name="hosted_button_id" value="A5CQ6L58YKWNY">
                      <input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                      <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
                      </form>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <h3>Depositos o transferencias</h3>
                  <p>Puedes realizar dépositos o transferencias bancarias a la siguiente cuenta:</p>
                    <br>
                  <p><b>Nuestra Cuenta:</b> Banco del Pacifico</p>
                  <p><b>Cuenta de Ahorros:</b> 1043009352</p>
                  <p><b>Nombre:</b> Gina Bresciani</p>
                  <p><b>Cédula:</b> 0102524691</p>
                  <br>
                </div>
              </div>
            </form>
          </fieldset>
          </div>
          <div class="about-col pt-3">
            <p>
              Si deseas colaborar con comida, medicamentos o insumos puedes realizarlo comunicandote con nuestro personal al número 0995575003 o 
              mediante nuestras redes sociales.
            </p>
          </div>  
      </div>    
  </section>

@endsection