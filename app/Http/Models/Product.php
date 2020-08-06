<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='articulo';
    protected $primaryKey = 'idarticulo';
    public $timestamps = false;

    protected $fillable = [
        'idcategoria',
        'codigo',
        'nombre',
        'stock',
        'descripcion',
        'precio',
        'imagen',
        'estado'
    ];
    protected $guarded = [

    ];

    public function cat(){
        return $this->hasOne(Category::class, 'idcategoria', 'idcategoria');
    }

    public function getGallery(){
        return $this->hasMany(PGallery::class, 'idarticulo', 'idarticulo');
    }
}
