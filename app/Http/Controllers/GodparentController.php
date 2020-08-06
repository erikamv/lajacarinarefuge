<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, Redirect;
use App\User;
use App\Http\Models\Animal;
use App\Http\Models\Godparent;
use Auth;
use DB;

class GodparentController extends Controller
{

    

    public function getAdoptionHome(Request $request, $status){
        if($status=='all'){
            if ($request){
                $query=trim($request->get('searchText'));
                $adopcion=DB::table('adoptante')
                -> where('nombre','LIKE','%'.$query.'%')
                -> orwhere('apellido','LIKE','%'.$query.'%')
                -> orderBy('idadoptante','desc')
                -> paginate(10);
            } 
        } else {
            if ($request){
                $query=trim($request->get('searchText'));
                $adopcion=DB::table('adoptante')
                -> where('estado','=',$status)
                -> orderBy('idadoptante','desc')
                -> paginate(10);
            } 
        }

        return view ('admin.adoptions.home', ["adopcion"=>$adopcion,"searchText"=>$query]);  
    }

    
    public function getAdoptionEdit($id){
        $adopcion=Adoption::findOrFail($id);
        $data = ['adopcion'=> $adopcion];
        return view("admin.adoptions.edit", $data);
    }

    public function postAdoptionEdit(Request $request, $id){
        $inputs   = $request->all() ;
        $adopcion=Adoption::findOrFail($id);
        $adopcion -> fechaAdopcion = $request -> get('fechaAdopcion');
        $adopcion -> save();
        return redirect('/admin/adoptions/all')->with('status','Formulario actualizado con éxito');
    }

    public function getAdoptionActive($id){
        $adopcion = Adoption::findOrFail($id);
        $data = ['adopcion'=> $adopcion];
        return view ('admin.adoptions.modal', $data);
    }


    public function postAdoptionActive($id){
        $adopcion = Adoption::findOrFail($id);
        if($adopcion->estado =='0'){
            $adopcion->estado='1';
            $adopcion->save();
            $data = ['nombre'=>$adopcion->nombre, 'apellido'=>$adopcion->apellido, 'email'=>$adopcion->email];
            Mail::to($adopcion->email)->send(new AdoptionSendConfirmation($data));
            return redirect('/admin/adoptions/all')->with('status', 'Correo de confirmación enviado');
        } 
        else {
            return redirect('/admin/adoptions/all')->with('alert', 'Este formulario no puede ser activado');
        }
        
    }

    public function getAdoptionDelete($id){
        $adopcion=Adoption::findOrFail($id);
        if ($adopcion -> estado != '2'){
            $adopcion -> estado ='2';
            $adopcion -> save();
            return Redirect::to('/admin/adoptions/2')->with('status', 'Registro eliminado con éxito');
        } else {
            return back()->with('alert', 'Registro inexistente o prohibído');
        }

    }


}
