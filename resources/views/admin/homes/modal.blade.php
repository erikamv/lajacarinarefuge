@extends('admin.master')
@section('tittle', 'Activar Hogar Temporal')
@section('breadcrumb')
<li class="active">
    <a style="color: #828860; font-size: 18px;">Solicitudes</a>
</li>
<li class="active">
    <a href="{{url('/admin/homes/all')}}" class="nav-link" style="color: #828860; font-size: 18px;">Voluntariado</a>
</li>
@endsection

@section('contenido')


<div class="panel panel-body" aria-hidden="true" role="dialog" tabindex="-1" >
    {!!Form::open(array('url'=>'/admin/homes/'.$hogar->idhogar.'/active', 'method'=>'POST'))!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-tittle">Confirmar formulario</h4>
            </div>
            <div class="modal-body">
                <p>Confirme si desea <b>activar</b> el formulario.</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary" >Confirmar</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>
@endsection