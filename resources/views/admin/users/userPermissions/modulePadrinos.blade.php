<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="panel panel-body">
        <div class="header">
            <h2 class="tittle"><i class="fa fa-dog"></i> Formularios: Adopciones </h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-check">
                <p><label for="adoption"><input type="checkbox" value="true" name="adoption" @if(kvfj($users->permissions, 'adoption')) checked @endif> Puede ver el listado de formularios.</label></p>
            </div>
            <div class="form-check">
                <p><label for="adoptionEdit"><input type="checkbox" value="true" name="adoptionEdit" @if(kvfj($users->permissions, 'adoptionEdit')) checked @endif> Puede editar un formulario.</label></p>
            </div>
            <div class="form-check">
                <p><label for="adoptionDelete"><input type="checkbox" value="true" name="adoptionDelete" @if(kvfj($users->permissions, 'adoptionDelete')) checked @endif> Puede eliminar formularios.</label></p>
            </div>
            <div class="form-check">
                <p><label for="adoptionActive"><input type="checkbox" value="true" name="adoptionActive" @if(kvfj($users->permissions, 'adoptionActive')) checked @endif> Puede confirmar adopción.</label></p>
            </div>
        </div>

    </div>
</div>