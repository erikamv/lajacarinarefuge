<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Models\Product;
use App\Http\Models\Category;
use App\Http\Models\PGallery;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('userstatus');
        $this->middleware('userpermissions');
        $this->middleware('isadmin');
    }

    public function getHome(Request $request, $status){
        if($status=='all'){
            if ($request){
                $query=trim($request->get('searchText'));
                $articulos=DB::table('articulo as a')
                -> join('categoria as c', 'a.idcategoria','=','c.idcategoria')
                -> select('a.idarticulo', 'a.nombre','a.codigo','a.stock', 'c.nombre as categoria', 'a.descripcion','a.precio','a.imagen','a.estado')
                -> where('a.nombre','LIKE','%'.$query.'%')
                -> orwhere('a.codigo','LIKE','%'.$query.'%')
                -> orderBy('a.idarticulo','desc')
                -> paginate(10);
            } 
        } else {
            if ($request){
                $query=trim($request->get('searchText'));
                $articulos=DB::table('articulo as a')
                -> join('categoria as c', 'a.idcategoria','=','c.idcategoria')
                -> select('a.idarticulo', 'a.nombre','a.codigo','a.stock', 'c.nombre as categoria', 'a.descripcion','a.precio','a.imagen','a.estado')
                -> where('a.estado','=',$status)
                -> orderBy('a.idarticulo','desc')
                -> paginate(10);
            } 

        }
        return view ('admin.products.home', ["articulos"=>$articulos,"searchText"=>$query]);  
    }
    

    public function getProductsAdd(){
        $categories=DB::table('categoria') -> where('estado','=','Activo') -> get();
        return view ("admin.products.edit", ["categories"=>$categories]);
    }

    public function postProducts(Request $request){
        $inputs   = $request->all() ;
        $articulo = new Product;
        $articulo -> idcategoria = $request -> get('idcategoria');
        $articulo -> codigo = $request -> get('codigo');
        $articulo -> nombre = $request -> get('nombre');
        $articulo -> stock = $request -> get('stock');
        $articulo -> descripcion = $request -> get('descripcion');
        $articulo -> precio = $request -> get('precio');
        $articulo -> estado = 'Activo';

        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $file->move(public_path().'/static/imagenes/articulos/',$file->getClientOriginalName());
            $articulo -> imagen = $file -> getClientOriginalName();
        }

        $articulo -> save();
        return Redirect::to('/admin/products/activo');

    }

    public function show($id){
        return view("admin.products.show", ["product"=>Product::findOrFail($id)]);
    }

    

    public function getProductEdit($id){
        $articulo=Product::findOrFail($id);
        $categories=DB::table('categoria') -> where('estado','=','Activo') ->get();
       // $data = ['articulo'=> $articulo];
        //return view("admin.products.edit", $data);
        $images=DB::table('articulo_galeria') -> where('idarticulo','=',$id) ->get();
        return view("admin.products.edit", ["articulo"=>$articulo, "categories"=>$categories, "images"=>$images]);
    }

    public function productEdit(Request $request, $id){
        $inputs   = $request->all() ;
        $articulo=Product::findOrFail($id);
        $articulo -> idcategoria = $request -> get('idcategoria');
        $articulo -> codigo = $request -> get('codigo');
        $articulo -> nombre = $request -> get('nombre');
        $articulo -> stock = $request -> get('stock');
        $articulo -> descripcion = $request -> get('descripcion');
        $articulo -> precio = $request -> get('precio');
        $articulo -> estado = $request -> get('estado');

        if($request->hasFile('imagen')){
            $articuloImage = public_path("/static/imagenes/articulos/{$articulo->imagen}");
            if ($request->exists($articuloImage)){
                unlink($articuloImage);
            }

        
            $file=$request->file('imagen');
            $file->move(public_path().'/static/imagenes/articulos',$file->getClientOriginalName());
            $articulo -> imagen = $file -> getClientOriginalName();
        }

        

        $articulo -> save();
        return Redirect::to('/admin/products/activo');
    }

    public function getProductDelete($id){
        $articulo=Product::findOrFail($id);
        if ($articulo -> estado == 'Activo'){
            $articulo -> estado ='Inactivo';
            $articulo -> save();
            return Redirect::to('/admin/products/inactivo')->with('status', 'Registro eliminado con éxito');
        } else {
            return back()->with('alert', 'Registro inexistente o prohibído');
        }

    }

    public function productGalleryAdd(Request $request, $id){
        $rules = [
            'file_name' => 'required | mimes:jpeg,jpg,png | max:1000'
        ];
        
        $messages =  [
            
            'file_name.required' => 'Seleccione imágenes para la galería.'
        ];
        
        $this->validate($request, $rules, $messages);

        
        $galeria = new PGallery;
        $galeria -> idarticulo = $id;
        if($request->hasFile('file_name')){
            $file=$request->file('file_name');
            $file->move(public_path().'/static/imagenes/articulos/galeria',$file->getClientOriginalName());
            $galeria -> file_name = $file -> getClientOriginalName();
           
        }
        

        print("Se cargo supuestamente Falta guardar");
        $galeria -> save();
        return  back()->with('errors','Imagen guardada con éxito');


        /*if($request -> hasFile('file_image')){
            $path = '/'.date('Y-m-d');
            $fileExt = trim ($request->file('file_image')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disk.uploads.root');
        }*/
    }

    public function productGalleryDelete($id, $gid){
        $galeria=PGallery::findOrFail($gid);
        $file = $galeria ->file_name;
        if($galeria->idarticulo!=$id){
            return back()->with('alert','La imagen no se puede eliminar');
        } else {
            if($galeria->delete()){
                $articuloImage = public_path("/static/imagenes/articulos/galeria/{$galeria->file_name}");
                unlink($articuloImage);
                return back()->with('status','Imagen eliminada con éxito');
            }
        }

    }
    

}
