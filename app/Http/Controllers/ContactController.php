<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, Redirect;
use App\User;
use App\Http\Models\Contact;
use Auth, Mail;
use DB;

class ContactController extends Controller
{
    public function getVolunteer(){
        return view('/volunteer');
    }

    public function postVolunteer(Request $request){
        $voluntario = new Volunteer;
        $voluntario->idusuario=Auth::user()->id;
        $voluntario->nombre=e($request->nombre);
        $voluntario->apellido=e($request->apellido);
        $voluntario->fechaNacimiento=e($request->nacimiento);
        $voluntario->ciudad=e($request->ciudad);
        $voluntario->direccion=e($request->direccion);
        $voluntario->email=Auth::user()->email;
        $voluntario->telefono=e($request->telefono);
        $voluntario->observaciones=e($request->observaciones);
        $voluntario->save();
        return back()->with('status', 'Formulario enviado con éxito.');

    }

    public function getVolunteerHome(Request $request, $status){
        if($status=='all'){
            if ($request){
                $query=trim($request->get('searchText'));
                $voluntarios=DB::table('voluntario')
                -> where('nombre','LIKE','%'.$query.'%')
                -> orwhere('apellido','LIKE','%'.$query.'%')
                -> orderBy('idvoluntario','desc')
                -> paginate(10);
            } 
        } else {
            if ($request){
                $query=trim($request->get('searchText'));
                $voluntarios=DB::table('voluntario')
                -> where('estado','=',$status)
                -> orderBy('idvoluntario','desc')
                -> paginate(10);
            } 
        }

        return view ('admin.volunteers.home', ["voluntarios"=>$voluntarios,"searchText"=>$query]);  
    }

    
    public function getVolunteerEdit($id){
        $voluntario=Volunteer::findOrFail($id);
        $data = ['voluntario'=> $voluntario];
        return view("admin.volunteers.edit", $data);
    }

    public function postVolunteerEdit(Request $request, $id){
        $inputs   = $request->all() ;
        $voluntario=Volunteer::findOrFail($id);
        $voluntario -> fechaInicio = $request -> get('fechaInicio');
        $voluntario -> fechaFin = $request -> get('fechaFin');
        if(!is_null($request->fechaFin)){
            $voluntario -> estado = '2';
        }
        $voluntario -> save();
        return redirect('/admin/volunteers/all')->with('status','Formulario actualizado con éxito');
    }

    public function getVolunteerActive($id){
        $voluntario = Volunteer::findOrFail($id);
        $data = ['voluntario'=> $voluntario];
        return view ('admin.volunteers.modal', $data);
    }


    public function postVolunteerActive($id){
        $voluntario = Volunteer::findOrFail($id);
        if($voluntario->estado =='0'){
            $voluntario->estado='1';
            $voluntario->save();
            $data = ['nombre'=>$voluntario->nombre, 'apellido'=>$voluntario->apellido, 'email'=>$voluntario->email];
            Mail::to($voluntario->email)->send(new VolunteerSendConfirmation($data));
            return redirect('/admin/volunteers/all')->with('status', 'Correo de confirmación enviado');
        } 
        else {
            return redirect('/admin/volunteers/all')->with('alert', 'Este formulario no puede ser activado');
        }
        
    }

    public function getVolunteerDelete($id){
        $voluntario=Volunteer::findOrFail($id);
        if ($voluntario -> estado != '2'){
            $voluntario -> estado ='2';
            $voluntario -> save();
            return Redirect::to('/admin/volunteers/2')->with('status', 'Registro eliminado con éxito');
        } else {
            return back()->with('alert', 'Registro inexistente o prohibído');
        }

    }
    
}
