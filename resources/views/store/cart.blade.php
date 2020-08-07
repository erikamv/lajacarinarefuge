@extends('master')
@section('tittle', 'Carrito de Compras')
@section('style')
<link href="/static/css/bootstrapCarrito.css" rel="stylesheet">
@section('contenido')

<section id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-8" data-aos="fade-up" data-aos-delay="100">
          <div class="about-col p-5">
            <!--Valida que se seleccione un producto para el carrito-->
            
            <h3>LISTA DEL CARRITO</h3>
            <table class="table">
              <tbody>
                <tr>
                  <th width="15%">Código</th>
                  <th width="20%">Nombre</th>
                  <th width="15%">Cantidad</th>
                  <th width="15%">Precio</th>
                  <th width="15%">Total</th>
                  <th width="5%"></th>
                </tr>
                <!--Recorre el array para mostrar los productos en el carrito-->
                <tr>
                  
                  <td width="5%">
                  <form action="" method="POST">
                    <button style="border-width:0px; background-color:#fff;" type="submit" name="btnAccion" value="Eliminar">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
                  </td>
                </tr>
              </tbody>
            </table>    
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="about-col p-3">
            <table class="table" style="text-align: left;">
              <tbody>
                <h4 style="text-align: center; padding: 0.5rem;">CUENTA</h4>
                
                <tr>
                  
                </tr>
                <tr>
                  <th>Transporte</th>
                 
                </tr>
                <tr>
                  <th>Total</th>
                  <th></th>
                </tr>
              </tbody>
            </table>
            <hr>
            <form action="pago.php" method="post">
              <div class="boton" style="text-align: center;">
                <a href="{{url('/products/'.Auth::user()->id.'/cart/paid')}}"><button class="btn btn-adopta" type="submit" name="btnAccion">Comprar</button>
              </a></div>
            </form>
          </div>
        </div>
      </div>
      
    </div>    
  </section> <!--Fin información personal-->

@endsection