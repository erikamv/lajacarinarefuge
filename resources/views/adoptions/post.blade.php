<style>
    p.uppercase {
      text-transform: uppercase;
    }
</style>
    

        <div class="row ">
            @foreach($animal as $an)
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="about-col">
                    <div class="img">
                        <a href="{{url('/static/imagenes/animales/'.$an->imagen)}}" >
                            <img src="{{asset('/static/imagenes/animales/'.$an->imagen)}}" class="img-fluid" alt="{{ $an->nombre }}">
                        </a>
                        <div class="icon">
                            <a href="{{url('/adoptions/file/'.$an->idanimal)}}" title="Ver Ficha"><i class="fas fa-dog"></i></a>
                        </div>
                    </div>
                    <div class="informacion pt-5">
                        <p class="uppercase" style="text-align: center;">{{ $an->nombre }}</p>
                        <p style="text-align: center;">{{ $an->edad }} años</p>
                    </div>
                </div> 
            </div>
            @endforeach
        </div>
        {{$animal->render()}} 
    </div>
</section>

  
