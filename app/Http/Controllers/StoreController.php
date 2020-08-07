<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, Redirect;
use App\User;
use App\Http\Models\Product;
use App\Http\Models\Category;
use App\Http\Models\PGallery;
use Auth;
use DB;

class StoreController extends Controller
{
    public function getProductPost(Request $request, $status){
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
                //return view ('store.store', ["articulos"=>$articulos,"searchText"=>$query]);
            } 
        } else {
            if ($request){
                $query=trim($request->get('searchText'));
                $articulos=DB::table('articulo as a')
                -> join('categoria as c', 'a.idcategoria','=','c.idcategoria')
                -> select('a.idarticulo', 'a.nombre','a.codigo','a.stock', 'c.nombre as categoria', 'a.descripcion','a.precio','a.imagen','a.estado')
                -> where('a.idarticulo','=',$status)
                -> orderBy('a.idarticulo','desc')
                -> paginate(10);
               // return view ('store.store', ["articulos"=>$articulos,"searchText"=>$query]);
            }
        }
        
        $categoria=DB::table('categoria') -> where('estado','=','Activo') -> get();
        return view ('store.store', ["articulos"=>$articulos,"searchText"=>$query, 'categoria'=>$categoria]);
    }

    public function getProductProfile($code, $id){
        $articulo=Product::findOrFail($id);
        //$galeria=PGallery::where('idarticulo','=',$id);
        return view ("store.product", ["articulo"=>$articulo]);
    }

    public function getStoreCart(){
        return view ('store.cart');
    }

    public function getStoreCartPaid(){
        return view ('store.paid');
    }
}
