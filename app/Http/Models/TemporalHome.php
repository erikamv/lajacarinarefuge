<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class TemporalHome extends Model
{
    protected $table='hogartemporal';
    protected $primaryKey = 'idhogar';
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
        'lugar',
        'observaciones',
    ];
    protected $guarded = [

    ];
}