<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Models\Animal;
use App\Http\Models\Ficha;
use Illuminate\Support\Facades\Redirect;

class AnimalController extends Controller
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
            $animals=DB::table('animal')
             -> where('nombre','LIKE','%'.$query.'%')
            -> orwhere('edad','LIKE','%'.$query.'%')
            -> orwhere('sexo','LIKE','%'.$query.'%')
            -> where('estado','=','0')
            -> orderBy('idanimal','desc')
            -> paginate(15);
            return view ('admin.animals.home', ["animals"=>$animals,  "searchText"=>$query]);
        } 
        
        return view('admin.animals.home');
    }



    public function getAnimalsAdd(){
        return view('admin.animals.add');
    }

    public function postAnimals(Request $request){
        $rules = [
            'nombre' => 'required',
            'edad' => 'required',
            'sexo' => 'required',
            'imagen' => 'required',
            'peso' => 'required',
            'tamanio' => 'required',
            'vacunas' => 'required',
            'esterilizacion' => 'required',
            'historia' => 'required',
            
        ];
        $messages = [
            'nombre.required' => 'Se requiere un nombre.',
            'edad.required' => 'Se requiere la edad del animal.',
            'sexo.required' => 'Se requiere el sexo del animal.',
            'imagen.required' => 'Se requiere una imagen.',
            'peso.required' => 'Se requiere el peso del animal.',
            'tamanio.required' => 'Se requiere la raza del animal.',
            'vacunas.required' => 'Se requiere seleccionar si ha sido o no vacunado el animal.',
            'esterilizacion.required' => 'Se requiere seleccionar si ha sido o no esterilzado el animal.',
            'historia.required' => 'Se requiere una historia de registro.',

        ];

        $this->validate($request, $rules, $messages);

        $animals = new Animal;
        $animals -> nombre = e($request -> input('nombre'));
        $animals -> edad = e($request -> input('edad'));
        $animals -> sexo = e($request -> input('sexo'));

        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $file->move(public_path().'/static/imagenes/animales/',$file->getClientOriginalName());
            $animals -> imagen = $file -> getClientOriginalName();
        }

       
        $animals -> peso = e($request -> input('peso'));
        $animals -> tamanio = e($request -> input('tamanio'));
        $animals -> vacunas = e($request -> input('vacunas'));
        $animals -> esterilizacion = e($request -> input('esterilizacion'));
        $animals -> historia = e($request -> input('historia'));
        
        $animals -> save();

        return Redirect::to('/admin/animals');
    }

    public function getAnimalEdit($id){
        $animals=Animal::findOrFail($id);
        return view("admin.animals.edit",['animals'=> $animals]);
    }
    
    public function animalEdit(Request $request, $id){
        $rules = [
            'nombre' => 'required',
            'edad' => 'required',
            'sexo' => 'required',
            'peso' => 'required',
            'tamanio' => 'required',
            'vacunas' => 'required',
            'esterilizacion' => 'required',
            'historia' => 'required',
            
        ];
        $messages = [
            'nombre.required' => 'Se requiere un nombre.',
            'edad.required' => 'Se requiere la edad del animal.',
            'sexo.required' => 'Se requiere el sexo del animal.',
            'peso.required' => 'Se requiere el peso del animal.',
            'tamanio.required' => 'Se requiere la raza del animal.',
            'vacunas.required' => 'Se requiere seleccionar si ha sido o no vacunado el animal.',
            'esterilizacion.required' => 'Se requiere seleccionar si ha sido o no esterilzado el animal.',
            'historia.required' => 'Se requiere una historia de registro.',

        ];

        $this->validate($request, $rules, $messages);
        $inputs   = $request->all() ;
        $animals=Animal::findOrFail($id);

        $animals -> nombre = e($request -> input('nombre'));
        $animals -> edad = e($request -> input('edad'));
        $animals -> sexo = e($request -> input('sexo'));

        if($request->hasFile('imagen')){
            $articuloImage = public_path("/static/imagenes/animales/{$animals->imagen}");
           /* if ($request->exists($articuloImage)){
                unlink($articuloImage);
            }*/
        
            $file=$request->file('imagen');
            $file->move(public_path().'/static/imagenes/animales',$file->getClientOriginalName());
            $animals -> imagen = $file -> getClientOriginalName();
        }
        
       
        
        $animals -> peso = e($request -> input('peso'));
        $animals -> tamanio = e($request -> input('tamanio'));
        $animals -> vacunas = e($request -> input('vacunas'));
        $animals -> esterilizacion = e($request -> input('esterilizacion'));
        $animals -> historia = e($request -> input('historia'));
        $animals -> save();
        return Redirect::to('/admin/animals');
    }

    public function getAnimalDelete($id){
        $animals=Animal::findOrFail($id);
        $animals -> estado = '1';
        $animals -> save();
        return Redirect::to('/admin/animals')->with('status', 'Registro eliminado con éxito');
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
    


    

   

   
