<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="panel panel-body">
        <div class="header">
            <h2 class="tittle"><i class="fa fa-user-edit"></i> Sección Usuarios </h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-check">
                <p><label for="users"><input type="checkbox" value="true" name="users" @if(kvfj($users->permissions, 'users')) checked @endif> Puede ver el listado de usuarios.</label></p>
            </div>
            <div class="form-check">
                <p><label for="usersEdit"><input type="checkbox" value="true" name="usersEdit" @if(kvfj($users->permissions, 'usersEdit')) checked @endif> Puede editar información usuarios.</label></p>
            </div>
            <div class="form-check">
                <p><label for="usersBanned"><input type="checkbox" value="true" name="usersBanned" @if(kvfj($users->permissions, 'usersBanned')) checked @endif> Puede suspender cuentas usuarios.</label></p>
            </div>
            <div class="form-check">
                <p><label for="usersPermissions"><input type="checkbox" value="true" name="usersPermissions" @if(kvfj($users->permissions, 'usersPermissions')) checked @endif> Puede administrar permisos de usuarios.</label></p>
            </div>
        </div>

    </div>
</div>