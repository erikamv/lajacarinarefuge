<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="panel panel-body">
        <div class="header">
            <h2 class="tittle"><i class="fa fa-paw"></i>  Sección Refugio </h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-check">
                <p><label for="animals"><input type="checkbox" value="true" name="animals" @if(kvfj($users->permissions, 'animals')) checked @endif> Puede ver el listado de animales.</label></p>
            </div>
            <div class="form-check">
                <p><label for="animalsAdd"><input type="checkbox" value="true" name="animalsAdd" @if(kvfj($users->permissions, 'animalsAdd')) checked @endif> Puede agregar animales.</label></p>
            </div>
            <div class="form-check">
                <p><label for="animalsEdit"><input type="checkbox" value="true" name="animalsEdit" @if(kvfj($users->permissions, 'animalsEdit')) checked @endif> Puede editar animales.</label></p>
            </div>
            <div class="form-check">
                <p><label for="animalsDelete"><input type="checkbox" value="true" name="animalsDelete" @if(kvfj($users->permissions, 'animalsDelete')) checked @endif> Puede eliminar animales.</label></p>
            </div>
        </div>

    </div>
</div>