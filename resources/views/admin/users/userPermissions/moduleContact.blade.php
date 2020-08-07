<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="panel panel-body">
        <div class="header">
            <h2 class="tittle"><i class="fa fa-hands-helping"></i> Formularios: Voluntariado </h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-check">
                <p><label for="contact"><input type="checkbox" value="true" name="contact" @if(kvfj($users->permissions, 'contact')) checked @endif> Puede ver el listado de formularios.</label></p>
            </div>
            <div class="form-check">
                <p><label for="contactView"><input type="checkbox" value="true" name="contactView" @if(kvfj($users->permissions, 'contactView')) checked @endif> Puede editar un formulario.</label></p>
            </div>
            <div class="form-check">
                <p><label for="contactDelete"><input type="checkbox" value="true" name="contactDelete" @if(kvfj($users->permissions, 'contactDelete')) checked @endif> Puede eliminar formularios.</label></p>
            </div>
        </div>

    </div>
</div>