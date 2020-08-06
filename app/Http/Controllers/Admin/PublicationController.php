<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Http\Models\Publication;
use Illuminate\Support\Facades\Redirect;

class PublicationController extends Controller
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
            $publication=DB::table('publicacion as p')
            -> join('users as u', 'p.idautor','=','u.id')
            -> select('p.idpublicacion', 'p.titulo','p.contenido','p.tipo', 'u.name as autor', 'p.fecha','p.imagen')
            -> where('u.role','=','1')
            -> where('p.titulo','LIKE','%'.$query.'%')
            -> orwhere('p.tipo','LIKE','%'.$query.'%')
            -> orderBy('p.idpublicacion','desc')
            -> paginate(10);
            return view ('admin.publications.home', ["publication"=> $publication,"searchText"=>$query]);
        }   
    }
    

    public function getPublicationsAdd(){
        $users=User::where('role','=','1') -> get();
        return view ("admin.publications.add", ["users"=>$users]);
    }

    public function postPublication(Request $request){
        $inputs   = $request->all() ;
        $publication = new Publication;
        $publication -> idautor = $request -> get('idautor');
        $publication -> titulo = $request -> get('titulo');
        $publication -> contenido = $request -> get('contenido');
        $publication -> tipo = $request -> get('tipo');
        $publication -> fecha = $request -> get('fecha');
        $publication -> estado = 'Activo';

        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $file->move(public_path().'/static/imagenes/publicaciones/',$file->getClientOriginalName());
            $publication -> imagen = $file -> getClientOriginalName();
        }

        $publication -> save();
        return Redirect::to('/admin/publications');

    }

   /* public function show($id){
        return view("admin.publications.show", ["publication"=>Publication::findOrFail($id)]);
    }*/

    

    public function getPublicationEdit($id){
        $publication=Publication::findOrFail($id);
        $users=User::where('role','=','1') -> get();
        return view("admin.publications.edit", ["publication"=>$publication, "users"=>$users]);
    }

    public function publicationEdit(Request $request, $id){
        $inputs   = $request->all() ;
        $publication=Publication::findOrFail($id);
        $publication -> idautor = $request -> get('idautor');
        $publication -> titulo = $request -> get('titulo');
        $publication -> contenido = $request -> get('contenido');
        $publication -> tipo = $request -> get('tipo');
        $publication -> fecha = $request -> get('fecha');
        $publication -> estado = 'Activo';

        if($request->hasFile('imagen')){
            $articuloImage = public_path("/static/imagenes/publicaciones/{$publication->imagen}");
            if ($request->exists($articuloImage)){
                unlink($articuloImage);
            }

        
            $file=$request->file('imagen');
            $file->move(public_path().'/static/imagenes/publicaciones',$file->getClientOriginalName());
            $publication -> imagen = $file -> getClientOriginalName();
        }

        $publication -> save();
        return Redirect::to('/admin/publications');
    }

    public function getPublicationtDelete($id){
        $publication=Publication::findOrFail($id);
       // $publication -> estado ='Inactivo';
        $publication -> delete();
        return Redirect::to('/admin/publications');
    }
}
