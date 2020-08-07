<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table='carrito';
    protected $primaryKey = 'idcarrito';
    public $timestamps = false;

    protected $fillable = [
        'estado',
        'fecha',
    ];
    protected $guarded = [

    ];

    public static function findOrCreateBySessionID($session_id) {
        if ($session_id){
            //buscar carrito
            return Cart::findBySession($session_id);

        } 
        //crear carrito
        else {
            return Cart::createCart();

        }
    }

    public static function findBySession ($session_id){
        return Cart::findOrFail($session_id);
    }

    public static function createCart (){
        $carrito = new Cart;
        $carrito->estado="En progreso";
        $carrito->save();
        return $carrito;
    }

  }