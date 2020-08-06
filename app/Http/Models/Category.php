<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //use SoftDeletes;

    //protected $dates = ['deleted_at'];
    protected $table='categoria';
    protected $primaryKey = 'idcategoria';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    protected $guarded = [

    ];
    
}
