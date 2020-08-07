<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, Redirect;
use App\User;
use App\Http\Models\Contact;
use Auth, Mail;
use DB;

class ContactController extends Controller
{
    public function getContact(){
        return view('/contact');
    }

    public function postContact(Request $request){
        $contacto = new Contact;
        $contacto->nombre=e($request->nombre);
        $contacto->email=e($request->email);
        $contacto->mensaje=e($request->mensaje);
        $contacto->save();
        return back()->with('status', 'Formulario enviado con éxito.');

    }

    public function getContactHome(Request $request, $status){
        if($status=='all'){
            if ($request){
                $query=trim($request->get('searchText'));
                $contacto=DB::table('contacto')
                -> where('nombre','LIKE','%'.$query.'%')
                -> orderBy('idcontacto','desc')
                -> paginate(10);
            } 
        } else {
            if ($request){
                $query=trim($request->get('searchText'));
                $contacto=DB::table('contacto')
                -> where('estado','=',$status)
                -> orderBy('idcontacto','desc')
                -> paginate(10);
            } 
        }

        return view ('admin.contact.home', ["contacto"=>$contacto,"searchText"=>$query]);  
    }

    
    public function getContactView($id){
        $contacto=Contact::findOrFail($id);
        $data = ['contacto'=> $contacto];
        return view("admin.contact.edit", $data);
    }

    
    
    public function getContactDelete($id){
        $contacto=Contact::findOrFail($id);
        $contacto -> estado ='2';
        $contacto -> save();
        return Redirect::to('/admin/contact/2')->with('status', 'Registro eliminado con éxito');
        
    }
    
}
