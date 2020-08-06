<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $table='voluntario';
    protected $primaryKey = 'idvoluntario';
    public $timestamps = false;

    protected $fillable = [
        'idusuario',
        'nombre',
        'apellido',
        'fechaNacimiento',
        'direccion',
        'ciudad',
        'email',
        'telefono',
        'observaciones',
    ];
    protected $guarded = [

    ];
}
