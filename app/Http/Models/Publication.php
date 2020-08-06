<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table='publicacion';
    protected $primaryKey = 'idpublicacion';
    public $timestamps = false;

    protected $fillable = [
        'idautor',
        'titulo',
        'contenido',
        'tipo',
        'fecha',
        'imagen'
    ];
    protected $guarded = [

    ];

    public function getRouteKeyName(){
        return 'id';
    }
    
}
