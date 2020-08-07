<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Auth, Mail, Str;
use App\Http\Models\Publication;
use App\Http\Models\TemporalHome;
use DB;
use App\Http\Models\Volunteer;
use App\Mail\VolunteerSendConfirmation;


class ContentController extends Controller

{
    
    public function getHome(){
        return view('home');
    }


    //INICIO
    public function getPublicationPost(Request $request ){
           
        $publicacion=Publication::get();
        $data=["publicacion"=>$publicacion];
        return view ('home', $data)->with('publicacion', json_decode($publicacion, true));  
    }

    //QUIENES SOMOS
    public function getInformationHome(){
        return view('/information');
    }

    //AYUDA PATROCINIO
    public function getCollaboratorHome(){
        return view('/collaborators');
    }
    
    //AYUDA DONACIONES
    public function getDonationHome(){
        return view('/donations');
    }
    
    //AYUDA VOLUNTARIOS
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

    //hogartemporal
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

    //AYUDA ADOPCIONES
    public function getAdoptPost(Request $request, $status){
        if($status=='all'){
            if ($request){
                $query=trim($request->get('searchText'));
                $animal=DB::table('animal')
                -> where('nombre','LIKE','%'.$query.'%')
                -> where('estado','=','Activo')
                -> orderBy('idanimal','desc')
                -> paginate(5);
            }   
        } else {
            if($status=="macho"){
                if ($request){
                    $query=trim($request->get('searchText'));
                    $animal=DB::table('animal')
                    -> where('sexo','=',$status)
                    -> where('estado','=','Activo')
                    -> orderBy('idanimal','desc')
                    -> paginate(5);
                }  

            } else {

                if($status=="hembra"){
                    if ($request){
                        $query=trim($request->get('searchText'));
                        $animal=DB::table('animal')
                        -> where('sexo','=',$status)
                        -> where('estado','=','Activo')
                        -> orderBy('idanimal','desc')
                        -> paginate(5);
                    }
                } else {
                    if ($request){
                        $query=trim($request->get('searchText'));
                        $animal=DB::table('animal')
                        -> where('edad','<','1')
                        -> where('estado','=','Activo')
                        -> orderBy('idanimal','desc')
                        -> paginate(5);
                    }
                }
            }
        }
        
        return view ('adoptions.adoptions', ["animal"=>$animal,"searchText"=>$query]);
    }

    public function getStoreHome(){
        return view('/store/store');
    }
    public function getStoreCart(){
        return view('/store/cart');
    }

 //CONTACTANOS
 public function getContactHome(){
    return view('/contact');
}

public function getVPIHome(){
    return view('/mashup');
}

}
