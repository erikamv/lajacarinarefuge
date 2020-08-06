<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Models\Product;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('userstatus');
        $this->middleware('userpermissions');
        $this->middleware('isadmin');
    }

    public function getDashboard(){
        $users = User::count();
        $products = Product::where('estado', '=', 'Activo')->count();
        $data = ['users' => $users, 'products'=> $products];
        return view('admin.dashboard', $data);
    }
}
