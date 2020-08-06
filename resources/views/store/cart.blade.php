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
            <?php 
              if(!empty($_SESSION['CARRITO'])){ ?>
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
                <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?> 
                <tr>
                  <td width="15%"><?php echo $producto['CODIGO']?></td>
                  <td width="20%"><?php echo $producto['NOMBRE']?></td>
                  <td width="15%"><?php echo $producto['CANTIDAD']?></td>
                  <td width="15%"><?php echo $producto['PRECIO']?></td>
                  <td width="15%"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2)?></td> 
                  <td width="5%">
                  <form action="" method="POST">
                    <input type="hidden" name="codigo" id="codigo" value="<?php echo openssl_encrypt($producto['CODIGO'],COD,KEY)?>">
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
                <?php $total=0; ?>
                <tr>
                  <th><?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);?> articulo</th>
                  <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD'])?>
                  <th>$<?php echo number_format($total,2)?></th>
                </tr>
                <tr>
                  <th>Transporte</th>
                  <?php $transporte=$producto['CANTIDAD']*0.10?>
                  <th>$<?php echo number_format($transporte)?></th>
                </tr>
                <tr>
                  <th>Total</th>
                  <th>$<?php echo number_format($transporte+$total)?></th>
                </tr>
              </tbody>
            </table>
            <hr>
            <form action="pago.php" method="post">
              <div class="boton" style="text-align: center;">
                <button class="btn btn-adopta" type="submit" name="btnAccion">Comprar</button>
              </div>
            </form>
          </div>
        </div>
        <?php } ?> <!--Foreach-->
      </div>
      <?php } else { ?>
            <div class="alert">
              EL CARRITO ESTA VACIO
            </div>
            <?php } ?> <!--Alerta carrito vacio-->
    </div>    
  </section> <!--Fin información personal-->

@endsection