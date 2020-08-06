@extends('master')
@section('tittle', 'Catálogo')
@section('style')
<link href="/static/css/bootstrapProducto.css" rel="stylesheet">
@section('contenido')
<!--Bienvenida-->
<section id="about">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-md-12">
          <div class="categoria">
            <a href="#">Regresar</a>
          </div>
        </div>
      </div>
      <div class="row about-cols pt-5">
        <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
          <div class="about-col">
            <div class="row">
              <div class="col-md-5">
                <div class="element"> <!--Carrusel del producto-->
                  <div class="wrap-gallery-article">
                    <div id="myCarouselArticle" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#myCarouselArticle" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarouselArticle" data-slide-to="1"></li>
                        <li data-target="#myCarouselArticle" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active product-top">
                          <img class="img-fluid"  id="imagen" src="imagenes/palcas-hueso.png" alt="Card image cap" title="" width="500px" height="300px">
                        </div>
                        <div class="carousel-item product-top">
                          <img class="img-fluid"  id="imagen" src="imagenes/placas-estrella.png" alt="Card image cap" title="" width="500px" height="300px">
                        </div>
                        <div class="carousel-item product-top">
                          <img class="img-fluid"  id="imagen" src="imagenes/placas-huellas.png" alt="Card image cap" title="" width="500px" height="300px">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#myCarouselArticle" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#myCarouselArticle" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  <div class="row hidden-xs " id="slider-thumbs">
                    <!-- Bottom switcher of slider -->
                    <ul class="reset-ul d-flex flex-wrap list-thumb-gallery">
                       <li class="col-sm-3">
                          <a class="thumbnail" data-target="#myCarouselArticle" data-slide-to="0">
                            <img class="img-fluid" src="imagenes/palcas-hueso.png" alt="" width="80px" height="70px">
                          </a>
                      </li>
              
                      <li class="col-sm-3">
                        <a class="thumbnail" data-target="#myCarouselArticle" data-slide-to="1">
                          <img class="img-fluid" src="imagenes/placas-estrella.png" alt="" width="80px" height="70px">
                        </a>
                      </li>
              
                      <li class="col-sm-3">
                        <a class="thumbnail" data-target="#myCarouselArticle" data-slide-to="2">
                          <img class="img-fluid" src="imagenes/placas-huellas.png" alt="" width="80px" height="70px">
                        </a>
                      </li>
                    </ul>                 
                  </div>
                </div>
                </div>
              </div>
              <div class="detalles col-md-6 pt-5">
                <div class="nombre-producto">
                  <h4 class="nombre">PLACAS DE IDENTIFICACIÓN DE ALUMINIO. VARIOS COLORES Y FORMAS</h4>
                  <p style="font-size: 1rem;">Incluye grabación de datos</p>
                </div>
                <hr>
                <div class="precio-producto pt-2">
                  <h3 class="precio">$5.00</h3>
                  <p style="font-size: 1rem;">Impuestos incluidos</p>
                </div>
                <div class="datos-pedido">
                  <form role="form" id="form">
                    <div class="cantidad-producto pt-1">
                      <label for="cantidad"> <b>Cantidad:</b> </label>
                      <input id="cantidad" name="cantidad" type="number" class="form-control" required>
                    </div>
                    <div class="forma-producto pt-1">
                      <label for="forma"><b>Forma:</b></label>
                      <select name="forma" id="forma" class="form-control" required>
                        <option value="" >Formas disponibles</option> 
                        <option value="hueso" >Hueso</option>
                        <option value="huella" >Huella</option>
                        <option value="estrella" >Estrella</option>
                      </select>
                    </div>
                    <div class="color-producto pt-1">
                      <label for="color"> <b> Color:</b></label>
                      <select name="forma" id="forma" class="form-control" required>
                        <option value="" >Colores disponibles</option> 
                        <option value="hueso" >Negro</option>
                        <option value="huella" >Azul</option>
                        <option value="estrella" >Morado</option>
                      </select>
                    </div>
                    <div class="descripcion-producto pt-1">
                      <label for="descripcion"> <b>Datos para la placa:</b> </label>
                      <br>
                      <textarea name="descripcion" id="descripcion" cols="30" rows="5" required></textarea>
                    </div>
                  </form>
                </div>
                <div class="botones">
                    <button type="button" class="btn btn-adopta" data-toggle="modal" data-target="#myModal">
                      <i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">PRODUCTO AÑADIDO CORRECTAMENTE</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-modal" data-dismiss="modal">CONTINUAR COMPRANDO</button>
            <a href=""><button type="button" class="btn btn-modal">PAGAR</button></a>
          </div>
        </div>

      </div>
    </div>
  </section><!-- Final Bienvenida Sección -->

@endsection