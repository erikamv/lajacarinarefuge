<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Animal;
class Ficha extends Model
{
    protected $table='ficha';
    protected $primaryKey = 'idficha';
    public $timestamps = false;

    protected $fillable = [
       
        'idanimal',
        'peso',
        'tamaño',
        'vacunas',
        'esterilización',
        'historia'
    ];
    protected $guarded = [

    ];

    public function animal()
    {
        return $this->belongsTo('App\Http\Models\Animal', 'idanimal', 'idanimal');
    }
}


