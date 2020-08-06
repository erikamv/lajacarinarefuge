<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="panel panel-body">
        <div class="header">
            <h2 class="tittle"><i class="fa fa-home"></i> Formularios: Hogar Temporal </h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-check">
                <p><label for="home"><input type="checkbox" value="true" name="home" @if(kvfj($users->permissions, 'home')) checked @endif> Puede ver el listado de formularios.</label></p>
            </div>
            <div class="form-check">
                <p><label for="homeEdit"><input type="checkbox" value="true" name="homeEdit" @if(kvfj($users->permissions, 'homeEdit')) checked @endif> Puede editar un formulario.</label></p>
            </div>
            <div class="form-check">
                <p><label for="homeDelete"><input type="checkbox" value="true" name="homeDelete" @if(kvfj($users->permissions, 'homeDelete')) checked @endif> Puede eliminar formularios.</label></p>
            </div>
            <div class="form-check">
                <p><label for="homeActive"><input type="checkbox" value="true" name="homeActive" @if(kvfj($users->permissions, 'homeActive')) checked @endif> Puede confirmar hogar temporal.</label></p>
            </div>
        </div>

    </div>
</div>