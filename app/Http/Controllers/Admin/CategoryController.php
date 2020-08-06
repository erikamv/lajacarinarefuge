<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Models\Category;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('userstatus');
        $this->middleware('userpermissions');
        $this->middleware('isadmin');
    }

    public function getHome(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $categories=DB::table('categoria')
            -> where('nombre','LIKE','%'.$query.'%')
            -> where('estado','=','Activo')
            -> orderBy('idcategoria','desc')
            -> paginate(5);
            return view ('admin.categories.home', ["categories"=>$categories,"searchText"=>$query]);
        }   
        return view('admin.categories.home');
    }

    public function getCategoriesAdd(){
        return view('admin.categories.add');
    }

    public function postCategory(Request $request){
        $rules = [
            'nombre' => 'required',
            
        ];
        $messages = [
            'nombre.required' => 'Se requiere un nombre de categoría.',
        ];

        $this->validate($request, $rules, $messages);

        $categories = new Category;
        $categories -> nombre = e($request -> input('nombre'));
        $categories -> descripcion = e($request -> input('descripcion'));
        $categories -> estado = 'Activo';
        $categories -> save();

        return Redirect::to('/admin/categories');
    }

    public function getCategoryEdit($id){
        $categories=Category::findOrFail($id);
        $data = ['categories'=> $categories];
        return view("admin.categories.edit", $data);
    }
    
    public function categoryEdit(Request $request, $id){
        $rules = [
            'nombre' => 'required',
            
        ];
        $messages = [
            'nombre.required' => 'Se requiere un nombre de categoría.',
        ];

        $this->validate($request, $rules, $messages);

        $categories=Category::findOrFail($id);
        $categories -> nombre = e($request->get('nombre'));
        $categories -> descripcion = e($request->get('descripcion'));
        $categories -> estado = 'Activo';
        $categories -> save();

        return Redirect::to('/admin/categories');
    }

    public function getCategoryDelete($id){
        $categories=Category::findOrFail($id);
        $categories -> estado = 'Inactivo';
        $categories -> save();
        return Redirect::to('/admin/categories');
    }

/*

    public function store(Request $request){
        $categories = new Category;
        $categories -> nombre = $request -> get('nombre');
        $categories -> descripcion = $request -> get('descripcion');
        $categories -> save();
        return Redirect::to('/admin/categories');
    }

    public function show($id){
        return view("admin.categories.show", ["categories"=>Category::findOrFail($id)]);
    }


    */

  
}
