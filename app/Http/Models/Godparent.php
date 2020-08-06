<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Godparent extends Model
{
    protected $table='padrino';
    protected $primaryKey = 'idpadrino';
    public $timestamps = false;

    protected $fillable = [
        'idanimal',
        'nanimal',
        'nombre',
        'apellido',
        'fechaNacimiento',
        'direccion',
        'ciudad',
        'email',
        'telefono',
        'file',
    ];
    protected $guarded = [

    ];
}
