@extends('admin.master')
@section('tittle', 'Agregar animal')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Refugio</a>
</li>
<li class="active">
    <a href="{{url('/admin/animals')}}" style="color: #828860; font-size: 18px;">Animales</a>
</li>
<li class="active">
    <a href="{{url('/admin/animals/add')}}" class="nav-link" style="color: #828860; font-size: 18px;">Agregar animal</a>
</li>
@endsection

@section('contenido')

                <div class="col-xs-12 col-md-12 col-lg-12 ">
                    <div class="panel panel-body ">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h3>Nuevo registro</h3>
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

                        
                        {!!Form::open(array('url'=>'/admin/animals/add', 'method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                        {{Form::token()}}
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="edad">Edad</label>
                                    <input type="number" name="edad" required value="{{old('edad')}}" class="form-control" placeholder="Edad" min="0" step="any"> 
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <p>{!! Form::select('sexo', ['0'=>'Macho', '1'=>'Hembra'], null, ['class'=>'form-control', 'required'])!!}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <input type="file" name="imagen"  class="form-control" > 
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Peso</label>
                                    <input name="peso" type="number" class="form-control" placeholder="Peso" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Raza </label>
                                            <p>{!! Form::select('tamanio', ['0'=>'Pequeña', '1'=>'Mediana', '2'=>'Grande'], null, [ 'class'=>'form-control', 'required'])!!}
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Vacunas </label>
                                        <p>{!! Form::select('vacunas', ['0'=>'No', '1'=>'Si'], null, ['class'=>'form-control', 'required'])!!}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Esterilizado </label>
                                        <p>{!! Form::select('esterilizacion', ['0'=>'No', '1'=>'Si'], null, ['class'=>'form-control', 'required'])!!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label>Descripción del perro</label>
                                    <textarea name="historia" type="text" class="form-control ckeditor" rows="20" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg" type="submit">Guardar</button>
                                    <button class="btn btn-danger btn-lg" type="reset">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div><!--/.row-->
                        {!!Form::close()!!}
                    </div>
                </div>	
            
@endsection