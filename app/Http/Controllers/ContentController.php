<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function getHome(){
        return view('home');
    }

    

    public function getDonationHome(){
        return view('/donations');
    }


    public function getStoreHome(){
        return view('/store/store');
    }
    public function getStoreCart(){
        return view('/store/cart');
    }

 

}
