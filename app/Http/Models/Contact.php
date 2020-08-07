<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table='contacto';
    protected $primaryKey = 'idvoluntario';
    public $timestamps = false;

    protected $fillable = [
       
        'nombre',
        'email',
        'observaciones',
    ];
    protected $guarded = [

    ];
}