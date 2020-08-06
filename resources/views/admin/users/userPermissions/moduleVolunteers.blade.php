<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="panel panel-body">
        <div class="header">
            <h2 class="tittle"><i class="fa fa-hands-helping"></i> Formularios: Voluntariado </h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-check">
                <p><label for="volunteer"><input type="checkbox" value="true" name="volunteer" @if(kvfj($users->permissions, 'volunteer')) checked @endif> Puede ver el listado de formularios.</label></p>
            </div>
            <div class="form-check">
                <p><label for="volunteerEdit"><input type="checkbox" value="true" name="volunteerEdit" @if(kvfj($users->permissions, 'volunteerEdit')) checked @endif> Puede editar un formulario.</label></p>
            </div>
            <div class="form-check">
                <p><label for="volunteerDelete"><input type="checkbox" value="true" name="volunteerDelete" @if(kvfj($users->permissions, 'volunteerDelete')) checked @endif> Puede eliminar formularios.</label></p>
            </div>
            <div class="form-check">
                <p><label for="volunteerActive"><input type="checkbox" value="true" name="volunteerActive" @if(kvfj($users->permissions, 'volunteerActive')) checked @endif> Puede confirmar voluntariado.</label></p>
            </div>
        </div>

    </div>
</div>