<style>
    .owl-carousel .item {
      height: 70rem;
      background: white;
      padding: 1rem;
      box-shadow: 5px 2px whitesmoke;

    }
    .owl-carousel .item h4 {
      color: black;
      font-weight: 40;
      margin-top: 0rem;
     }
     .owl-carousel .item img {
      height: 250px;
     }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
    <script>
    jQuery(document).ready(function($){
      $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
      })
    })
    </script>


 <div class="container">
        <div class="owl-carousel owl-theme mt-5">
            @foreach($publicacion as $publicacion)
            <div class="item border">
                <h4 style="text-align: center"><strong>{{$publicacion['titulo']}}</strong></h4><br>
                <a href="{{url('/static/imagenes/publicaciones/'.$publicacion['imagen'])}}" >
                    <img src="{{asset('/static/imagenes/publicaciones/'.$publicacion['imagen'])}}" class="img-fluid" alt="{{ $publicacion['titulo'] }}" heigth="50px" width="50px"  >
                </a><br>
                <br><p style="text-align: justify">{{ $publicacion['contenido'] }}</p>
                <div class="col-lg-6"><i class="fa fa-clock-o"></i> {{$publicacion['fecha']}}</div>
                <div class="col-lg-6"><i class="fa fa-tag"></i> {{$publicacion['tipo']}}</div>
            </div>
             @endforeach
        </div>  
    </div>
       
 
                
            