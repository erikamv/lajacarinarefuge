<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orden';
    protected $primaryKey = 'idorden';
    public $timestamps = false;

    protected $fillable = [
        'idcliente',
        'codigo',
        'tipoComprobante',
        'serieComprobante',
        'fechaHora',
        'impuesto',
        'envio',
        'total',
        'estado'
    ];
    protected $guarded = [

    ];

  }
