
<?php

//key value from json
function kvfj($json, $key){
    if($json== null){
        return null;
    } else {
        $json=$json;
        $json=json_decode($json, true);
        if(array_key_exists($key, $json)){
            return $json[$key];
        }else {
            return null;
        }
    }
}

function getRoleUserArray($mode, $id){
    
    $roles=[
        '0' => 'Usuario normal',
        '1' => 'Administrador',

    ];

    if(!is_null($mode)) {
        return $roles;
    } else {
        return $roles[$id];
    }


}

function getStatusUserArray($mode, $id){
    $status=[
        '0' => 'Registrado',
        '1' => 'Verificado',
        '100' => 'Baneado',

    ];

    if(!is_null($mode)) {
        return $status;
    } else {
        return $status[$id];
    }
}

function getStatusArray($mode, $id){
    $status=[
        '0' => 'No',
        '1' => 'Si',
    ];

    if(!is_null($mode)) {
        return $status;
    } else {
        return $status[$id];
    }
}


function getStatusSizeArray($mode, $id){
    $status=[
        '0' => 'Pequeño',
        '1' => 'Mediano',
        '2' => 'Grande',
    ];

    if(!is_null($mode)) {
        return $status;
    } else {
        return $status[$id];
    }
}

function getStatusSexArray($mode, $id){
    $status=[
        '0' => 'Macho',
        '1' => 'Hembra',
    ];

    if(!is_null($mode)) {
        return $status;
    } else {
        return $status[$id];
    }
}
function getStatusAnimalArray($mode, $id){
    $status=[
        '0' => 'Activo',
        '1' => 'Inactivo',
        '2' => 'Adoptado',
        '3' => 'Apadrinado',
        '4' => 'Hogar temporal',
    ];

    if(!is_null($mode)) {
        return $status;
    } else {
        return $status[$id];
    }
}


function getStatusHelpArray($mode, $id){
    $status=[
        '0' => 'Registrado',
        '1' => 'Activo',
        '2' => 'Descartado',
    ];

    if(!is_null($mode)) {
        return $status;
    } else {
        return $status[$id];
    }
}


function getStatusProductsArray($mode, $id){
    $status=[
        '0' => 'Mantenimiento',
        '1' => 'Activo',
        '2' => 'Inactivo',
    ];

    if(!is_null($mode)) {
        return $status;
    } else {
        return $status[$id];
    }
}

    /*function userPermissions(){
        $permisos = [
            'dashboard'=>[
                'tittle' => 'Inicio'
            ];

        ];
        return $permisos;
    }*/

    function getUsersYears(){
        $year = date('Y');
        $yearMin = $year - 18;
        $yearMax = $yearMin - 62;

        return [$yearMin, $yearMax];
    }


