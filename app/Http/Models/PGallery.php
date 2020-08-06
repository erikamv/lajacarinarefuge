<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PGallery extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = ['articulo_galeria'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $primaryKey = 'id';
   

    protected $fillable = [
        'idarticulo',
        'file_name',
        
        
    ];
    
}
