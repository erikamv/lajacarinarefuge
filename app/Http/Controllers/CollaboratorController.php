<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, Redirect;
use App\User;
use App\Http\Models\Collaborator;
use Auth, Mail;
use DB;
use App\Mail\CollaboratorSendConfirmation;

class CollaboratorController extends Controller
{
    public function getCollaboratorHome(){
        return view('/collaborators');
    }

    public function postCollaboratorHome(Request $request){
        $colaborador = new Collaborator;
        $colaborador->empresa=$request->empresa;
        $colaborador->direccion=e($request->direccion);
        $colaborador->email=e($request->email);
        $colaborador->telefono=e($request->telefono);
        $colaborador->observaciones=e($request->observaciones);
        $colaborador->save();
        return back()->with('status', 'Formulario enviado con éxito.');

    }

    public function getCollaborator(Request $request, $status){
        if($status=='all'){
            if ($request){
                $query=trim($request->get('searchText'));
                $collaborator=DB::table('colaborador')
                -> where('empresa','LIKE','%'.$query.'%')
                -> orderBy('idcolaborador','desc')
                -> paginate(10);
            } 
        } else {
            if ($request){
                $query=trim($request->get('searchText'));
                $collaborator=DB::table('colaborador')
                -> where('estado','=',$status)
                -> orderBy('idcolaborador','desc')
                -> paginate(10);
            } 
        }

        return view ('admin.collaborators.home', ["collaborator"=>$collaborator,"searchText"=>$query]);  
    }

    
    public function getCollaboratorEdit($id){
        $collaborator=Collaborator::findOrFail($id);
        $data = ['collaborator'=> $collaborator];
        return view("admin.collaborators.edit", $data);
    }

    public function postCollaboratorEdit(Request $request, $id){
        $inputs   = $request->all() ;
        $collaborator=Collaborator::findOrFail($id);
        $collaborator -> fechaInicio = $request -> get('fechaInicio');
        $collaborator -> fechaFin = $request -> get('fechaFin');
        if(!is_null($request->fechaFin)){
            $collaborator -> estado = '2';
        }
        $collaborator -> save();
        return redirect('/admin/collaborators/all')->with('status','Formulario actualizado con éxito');
    }

    public function getCollaboratorActive($id){
        $collaborator = Collaborator::findOrFail($id);
        $data = ['collaborator'=> $collaborator];
        return view ('admin.collaborators.modal', $data);
    }


    public function postCollaboratorActive($id){
        $collaborator = Collaborator::findOrFail($id);
        if($collaborator->estado =='0'){
            $collaborator->estado='1';
            $collaborator->save();
            $data = ['empresa'=>$collaborator->empresa, 'email'=>$collaborator->email];
            Mail::to($collaborator->email)->send(new CollaboratorSendConfirmation($data));
            return redirect('/admin/collaborators/all')->with('status', 'Correo de confirmación enviado');
        } 
        else {
            return redirect('/admin/collaborators/all')->with('alert', 'Este formulario no puede ser activado');
        }
        
    }

    public function getCollaboratorDelete($id){
        $collaborator=Collaborator::findOrFail($id);
        if ($collaborator -> estado != '2'){
            $collaborator -> estado ='2';
            $collaborator -> save();
            return Redirect::to('/admin/collaborators/2')->with('status', 'Registro eliminado con éxito');
        } else {
            return back()->with('alert', 'Registro inexistente o prohibído');
        }

    }
    
}