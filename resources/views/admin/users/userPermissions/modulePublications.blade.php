<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="panel panel-body">
        <div class="header">
            <h2 class="tittle"><i class="fa fa-file-alt"></i>  Sección Publicaciones </h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-check">
                <p><label for="publications"><input type="checkbox" value="true" name="publications" @if(kvfj($users->permissions, 'publications')) checked @endif> Puede ver el listado de publicaciones.</label></p>
            </div>
            <div class="form-check">
                <p><label for="publicationsAdd"><input type="checkbox" value="true" name="publicationsAdd" @if(kvfj($users->permissions, 'publicationsAdd')) checked @endif> Puede agregar publicaciones.</label></p>
            </div>
            <div class="form-check">
                <p><label for="publicationsEdit"><input type="checkbox" value="true" name="publicationsEdit" @if(kvfj($users->permissions, 'publicationsEdit')) checked @endif> Puede editar publicaciones.</label></p>
            </div>
            <div class="form-check">
                <p><label for="publicationsDelete"><input type="checkbox" value="true" name="publicationsDelete" @if(kvfj($users->permissions, 'publicationsDelete')) checked @endif> Puede eliminar publicaciones.</label></p>
            </div>
        </div>

    </div>
</div>