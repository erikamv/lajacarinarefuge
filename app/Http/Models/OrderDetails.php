<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table='detalle_orden';
    protected $primaryKey = 'iddetalle_orden';
    public $timestamps = false;

    protected $fillable = [
        'idorden',
        'idarticulo',
        'cantidad',
        'precio',
        'descuento',
        'estado',
    ];
    protected $guarded = [

    ];

}    