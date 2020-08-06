<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="panel panel-body">
        <div class="header">
            <h2 class="tittle"><i class="fa fa-building"></i> Formularios: Patrocinadores </h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-check">
                <p><label for="collaborator"><input type="checkbox" value="true" name="collaborator" @if(kvfj($users->permissions, 'collaborator')) checked @endif> Puede ver el listado de formularios.</label></p>
            </div>
            <div class="form-check">
                <p><label for="collaboratorEdit"><input type="checkbox" value="true" name="collaboratorEdit" @if(kvfj($users->permissions, 'collaboratorEdit')) checked @endif> Puede editar un formulario.</label></p>
            </div>
            <div class="form-check">
                <p><label for="collaboratorDelete"><input type="checkbox" value="true" name="collaboratorDelete" @if(kvfj($users->permissions, 'collaboratorDelete')) checked @endif> Puede eliminar formularios.</label></p>
            </div>
            <div class="form-check">
                <p><label for="collaboratorActive"><input type="checkbox" value="true" name="collaboratorActive" @if(kvfj($users->permissions, 'collaboratorActive')) checked @endif> Puede confirmar colaboradores.</label></p>
            </div>
        </div>

    </div>
</div>