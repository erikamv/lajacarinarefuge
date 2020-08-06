@extends('admin.master')
@section('tittle', 'Editar registro')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Refugio</a>
</li>
<li class="active">
    <a  href="{{url('/admin/animals')}}" style="color: #828860; font-size: 18px;">Animales</a>
</li>
<li class="active">
    <a href="{{url('/admin/animals/edit')}}" class="nav-link" style="color: #828860; font-size: 18px;">Editar registro</a>
</li>
@endsection
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar registro: {{$animals->nombre}}</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors -> all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

    {!!Form::open(array('url'=>'/admin/animals/'.$animals->idanimal.'/edit', 'method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

            
    {{Form::token()}}
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required value="{{$animals->nombre}}" class="form-control" >
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="number" name="edad" required value="{{$animals->edad}}" class="form-control" min="0" step="any"> 
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Sexo</label>
                {!! Form::select('sexo', ['0'=>'Macho', '1'=>'Hembra'], $animals->sexo, ['class'=>'form-control', 'required']) !!} 
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Peso</label>
                <input name="peso" type="number" class="form-control" required value="{{$animals->peso}}" placeholder="Peso" required>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control" >
                @if (($animals->imagen)!="")
                    <img src="{{asset('/static/imagenes/animales/'.$animals->imagen)}}" alt="" heigth="100px" width="100px">
                @endif 
            </div>
        </div>
        
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Raza </label>
                        <p>{!! Form::select('tamanio', ['0'=>'Pequeña', '1'=>'Mediana', '2'=>'Grande'], $animals->tamaño, [ 'class'=>'form-control', 'required'])!!}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <label>Vacunas </label>
                    <p>{!! Form::select('vacunas', ['0'=>'No', '1'=>'Si'], $animals->vacunas, ['class'=>'form-control', 'required'])!!}</p>
                    </div>
                    <div class="col-md-4">
                        <label>Esterilizado </label>
                    <p>{!! Form::select('esterilizacion', ['0'=>'No', '1'=>'Si'], $animals->esterilizacion, ['class'=>'form-control', 'required'])!!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="estado">Estado</label>
                {!! Form::select('estado', ['0'=>'Activo', '1'=>'Inctivo', '2'=>'Adoptado', '3'=>'Apadrinado', '4'=>'Hogar temporal'], $animals->estado, [ 'class'=>'form-control'])!!}
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label>Descripción del perro</label>
                {!! Form::textarea('historia',$animals->historia,['class'=>'form-control', 'id'=>'editor', 'class' => 'ckeditor', 'value'=> '{{$ficha->historia}}']) !!}
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
    </div>        


            {!!Form::close()!!}
            
        
@endsection