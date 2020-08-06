<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, Redirect;
use App\User;
use App\Http\Models\TemporalHome;
use Auth, Mail;
use DB;
use App\Mail\HomeSendConfirmation;

class HomesController extends Controller
{
    public function getHomeIndex(){
        return view('/homes');
    }

    public function postHomeIndex(Request $request){
        $hogar = new TemporalHome;
        $hogar->idusuario=Auth::user()->id;
        $hogar->nombre=e($request->nombre);
        $hogar->apellido=e($request->apellido);
        $hogar->fechaNacimiento=e($request->nacimiento);
        $hogar->ciudad=e($request->ciudad);
        $hogar->direccion=e($request->direccion);
        $hogar->email=Auth::user()->email;
        $hogar->telefono=e($request->telefono);
        $hogar->lugar=e($request->lugar);
        $hogar->observaciones=e($request->observaciones);
        $hogar->save();
        return back()->with('status', 'Formulario enviado con éxito.');
    }

    public function getTemporalHome(Request $request, $status){
        if($status=='all'){
            if ($request){
                $query=trim($request->get('searchText'));
                $hogar=DB::table('hogartemporal')
                -> where('nombre','LIKE','%'.$query.'%')
                -> orwhere('apellido','LIKE','%'.$query.'%')
                -> orderBy('idhogar','desc')
                -> paginate(10);
            } 
        } else {
            if ($request){
                $query=trim($request->get('searchText'));
                $hogar=DB::table('hogartemporal')
                -> where('estado','=',$status)
                -> orderBy('idhogar','desc')
                -> paginate(10);
            } 
        }

        return view ('admin.homes.home', ["hogar"=>$hogar,"searchText"=>$query]);  
    }

    
    public function getHomesEdit($id){
        $hogar=TemporalHome::findOrFail($id);
        $data = ['hogar'=> $hogar];
        return view("admin.homes.edit", $data);
    }

    public function postHomesEdit(Request $request, $id){
        $inputs   = $request->all() ;
        $hogar=TemporalHome::findOrFail($id);
        $hogar -> fechaInicio = $request -> get('fechaInicio');
        $hogar -> fechaFin = $request -> get('fechaFin');
        if(!is_null($request->fechaFin)){
            $hogar -> estado = '2';
        }
        $hogar -> save();
        return redirect('/admin/homes/all')->with('status','Formulario actualizado con éxito');
    }

    public function getHomesActive($id){
        $hogar = TemporalHome::findOrFail($id);
        $data = ['hogar'=> $hogar];
        return view ('admin.homes.modal', $data);
    }


    public function postHomesActive($id){
        $hogar = TemporalHome::findOrFail($id);
        if($hogar->estado =='0'){
            $hogar->estado='1';
            $hogar->save();
            $data = ['nombre'=>$hogar->nombre, 'apellido'=>$hogar->apellido, 'email'=>$hogar->email];
            Mail::to($hogar->email)->send(new HomeSendConfirmation($data));
            return redirect('/admin/homes/all')->with('status', 'Correo de confirmación enviado');
        } 
        else {
            return redirect('/admin/homes/all')->with('alert', 'Este formulario no puede ser activado');
        }
        
    }

    public function getHomesDelete($id){
        $hogar=TemporalHome::findOrFail($id);
        if ($hogar -> estado != '2'){
            $hogar -> estado ='2';
            $hogar -> save();
            return Redirect::to('/admin/homes/2')->with('status', 'Registro eliminado con éxito');
        } else {
            return back()->with('alert', 'Registro inexistente o prohibído');
        }

    }
    
}
