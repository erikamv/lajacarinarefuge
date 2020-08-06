<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    protected $table='adoptante';
    protected $primaryKey = 'idadoptante';
    public $timestamps = false;

    protected $fillable = [
        'idusuario',
        'nombre',
        'apellido',
        'fechaNacimiento',
        'idanimal',
        'nanimal',
        'direccion',
        'ciudad',
        'email',
        'telefono',
        'familia',
        'propiedad',
        'porque',
        'lugar',
        'observaciones',
    ];
    protected $guarded = [

    ];
}
