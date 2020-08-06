<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

use App\Http\Models\Ficha;
class Animal extends Model
{
    protected $table='animal';
    protected $primaryKey = 'idanimal';
    public $timestamps = false;

    protected $fillable = [
       
        'nombre',
        'edad',
        'sexo',
        'imagen',
        'estado'
    ];
    protected $guarded = [

    ];

    
}

