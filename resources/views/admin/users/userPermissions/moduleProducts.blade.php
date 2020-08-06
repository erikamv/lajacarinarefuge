<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="panel panel-body">
        <div class="header">
            <h2 class="tittle"><i class="fa fa-shopping-bag"></i>  Sección Artículos </h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-check">
                <p><label for="products"><input type="checkbox" value="true" name="products" @if(kvfj($users->permissions, 'products')) checked @endif> Puede ver el listado de artículos.</label></p>
            </div>
            <div class="form-check">
                <p><label for="productsAdd"><input type="checkbox" value="true" name="productsAdd" @if(kvfj($users->permissions, 'productsAdd')) checked @endif> Puede agregar artículos.</label></p>
            </div>
            <div class="form-check">
                <p><label for="productsEdit"><input type="checkbox" value="true" name="productsEdit" @if(kvfj($users->permissions, 'productsEdit')) checked @endif> Puede editar artículos.</label></p>
            </div>
            <div class="form-check">
                <p><label for="productsDelete"><input type="checkbox" value="true" name="productsDelete" @if(kvfj($users->permissions, 'productsDelete')) checked @endif> Puede eliminar artículos.</label></p>
            </div>
            <div class="form-check">
                <p><label for="productsGallery"><input type="checkbox" value="true" name="productsGallery" @if(kvfj($users->permissions, 'productsGallery')) checked @endif> Puede administrar la galería.</label></p>
            </div>
        </div>

    </div>
</div>