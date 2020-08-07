@extends('master')
@section('tittle', 'Pago de compra')
@section('style')
<link href="/static/css/bootstrapCarrito.css" rel="stylesheet">
@section('contenido')
<hr>
    <section id="about">
      <div class="container">
        <!--Formulario para pagar-->
          <div class="row">
            <div class="col-md-9">
              <form action="" method="post" class="form">
              <div class="datos-pedido about-col">
                <fieldset>
                  <h3>Información de envío</h3>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group col-md-6">
                      <input id="apellido" name="apellido" type="text" class="form-control" placeholder="Apellido" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input id="direccion" name="direccion" type="text" class="form-control" placeholder="Dirección" required>
                    </div>
                    <div class="form-group col-md-6">
                      <input id="referencia" name="referencia" type="text" class="form-control" placeholder="Referencia"required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input id="ciudad" name="ciudad" type="text" class="form-control" placeholder="Ciudad" required>
                    </div>
                    <div class="form-group col-md-6">
                      <input id="provincia" name="provincia" type="text" class="form-control" placeholder="Provincia"required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input id="telefono" name="telefono" type="tel" class="form-control" placeholder="Télefono móvil" required>
                    </div>
                    <div class="form-group col-md-6">
                      <input id="codigoPostal" name="codigoPostal" type="number" class="form-control" placeholder="Código Postal"required>
                    </div>
                  </div>
                  <div class="boton pt-3">
                    <input  id="submit" name="submit" type="submit" value="Confirmar" style="background-color: #828860;width: 30%;font-size: 1rem; border-radius: 0.2rem;color: #fff;font-family: 'Poppins', sans-serif;">
                  </div>
                  <div class="pt-4">
                      <label for="factura">La factura será enviada a su cuenta de correo eléctronico registrado.</label>
                  </div>
                </fieldset>
              </div>
            </form>
            
              
          </div>
        <div class="col-md-3">
          <div class="p-4 about-col">
          <div class="form-group">
          <h3>Total a pagar</h3>
            <div>
             
            </div>
          </div>
          </div>
        </div>
        <div class="col-md-9">
            <div class="pt-3 about-col">
              <div class="form-group p-4">
                  <h3>Método de pago</h3>
                  <div class="transferencia">
                      <input type="checkbox" id="trans" name="trans" onchange="showContentTransaccion()">
                      <label class="trans-m" for="trans" style="margin-left: 0.2rem;">Pago por transferencia bancaria</label>
                      <div id="content" style="display: none;">
                        <p style="margin-left: 1rem;">Por favor, transfiera el importe de la factura a nuestra cuenta bancaria. Recibirá nuestra 
                          confirmación de pedido por correo electrónico con los datos bancarios y el número de pedido. 
                          Los bienes se reservarán 0 días para usted y procesaremos el pedido inmediatamente tras la
                          recepción del pago.</p>
                      </div>
                  </div>
                  <div class="payPal">
                    <input type="checkbox" id="pay" name="pay" onchange="showContentPaypal()">
                    <label for="pay" style="margin-left: 0.2rem;">Pago por paypal</label>
                    <div id="contenido" style="display: none;">
                    <!--Aqui se guarda el boton de pago de paypal. No es necesario código-->
                      <div id="paypal-button-container"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>  
    </section> <!--Fin información personal-->
@endsection