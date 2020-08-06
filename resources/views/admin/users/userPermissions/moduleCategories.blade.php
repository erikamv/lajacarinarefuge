<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="panel panel-body">
        <div class="header">
            <h2 class="tittle"><i class="fa fa-clipboard-list"></i>  Sección Categorías </h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-check">
                <p><label for="categories"><input type="checkbox" value="true" name="categories" @if(kvfj($users->permissions, 'categories')) checked @endif> Puede ver el listado de categorías.</label></p>
            </div>
            <div class="form-check">
                <p><label for="categoriesAdd"><input type="checkbox" value="true" name="categoriesAdd" @if(kvfj($users->permissions, 'categoriesAdd')) checked @endif> Puede agregar categorías.</label></p>
            </div>
            <div class="form-check">
                <p><label for="categoriesEdit"><input type="checkbox" value="true" name="categoriesEdit" @if(kvfj($users->permissions, 'categoriesEdit')) checked @endif> Puede editar categorías.</label></p>
            </div>
            <div class="form-check">
                <p><label for="categoriesDelete"><input type="checkbox" value="true" name="categoriesDelete" @if(kvfj($users->permissions, 'categoriesDelete')) checked @endif> Puede eliminar categorías.</label></p>
            </div>
        </div>

    </div>
</div>