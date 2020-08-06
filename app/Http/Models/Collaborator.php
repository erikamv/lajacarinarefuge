<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    protected $table='colaborador';
    protected $primaryKey = 'idcolaborador';
    public $timestamps = false;

    protected $fillable = [
        'empresa',
        'direccion',
        'email',
        'telefono',
        'observaciones',
    ];
    protected $guarded = [

    ];
}
