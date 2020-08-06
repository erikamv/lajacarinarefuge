<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, Redirect;
use App\User;
use App\Http\Models\Publication;
use Auth;
use DB;

class PublicationController extends Controller
{
    

    public function getPublicationPost(Request $request ){
           
        $publicacion=Publication::get();
        $data=["publicacion"=>$publicacion];
        return view ('home', $data)->with('publicacion', json_decode($publicacion, true));  
    }
    
    
}
