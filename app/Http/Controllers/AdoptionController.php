<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, Redirect;
use App\User;
use App\Http\Models\Animal;
use App\Http\Models\Adoption;
use App\Http\Models\Godparent;
use Auth;
use DB;

class AdoptionController extends Controller
{

    //WEB

    
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


    public function getAdoptFile($id){
        $animal=Animal::where('idanimal','=',$id) -> first();
        return view('adoptions.ficha', ['animal'=> $animal]);
    }

    
    public function getAdoptForm($id){
        $animal= Animal::where('idanimal','=',$id)->first();
        $data=['animal', $animal];
        return view('adoptions.adoptar', ['animal', $animal])->with('animal', json_decode($animal, true));  
    }

    public function getGodparentForm($id){
        $animal= Animal::where('idanimal','=',$id)->first();
        $data=['animal', $animal];
        return view('adoptions.apadrinar', ['animal', $animal])->with('animal', json_decode($animal, true)); 
    }


    public function getAdoption(){
        return view('/adoptions');
    }

    public function postAdoptForm(Request $request){
        $adopcion = new Adoption;
        $adopcion->idusuario=Auth::user()->id;
        $adopcion->nombre=e($request->nombre);
        $adopcion->apellido=e($request->apellido);
        $adopcion->fechaNacimiento=e($request->nacimiento);
        $adopcion->idanimal=e($request->idanimal);
        $adopcion->nanimal=e($request->nanimal);
        $adopcion->ciudad=e($request->ciudad);
        $adopcion->direccion=e($request->direccion);
        $adopcion->email=Auth::user()->email;
        $adopcion->telefono=e($request->telefono);
        $adopcion->familia=e($request->familia);
        $adopcion->propiedad=e($request->propiedad);
        $adopcion->porque=e($request->porque);
        $adopcion->lugar=e($request->lugar);
        $adopcion->observaciones=e($request->observaciones);
        $adopcion->save();
        return back()->with('status', 'Formulario enviado con éxito.');
    }

    public function postGodparentForm(Request $request){
        $padrino = new Godparent;
        $padrino->idusuario=Auth::user()->id;
        $padrino->nombre=e($request->nombre);
        $padrino->apellido=e($request->apellido);
        $padrino->fechaNacimiento=e($request->nacimiento);
        $padrino->idanimal=e($request->idanimal);
        $padrino->nanimal=e($request->nanimal);
        $padrino->ciudad=e($request->ciudad);
        $padrino->direccion=e($request->direccion);
        $padrino->email=Auth::user()->email;
        $padrino->telefono=e($request->telefono);

        if($request->hasFile('file')){
            $file=$request->file('file');
            $file->move(public_path().'/static/archivos/padrinos/',$file->getClientOriginalName());
            $padrino -> file = $file -> getClientOriginalName();
        }
        
        $padrino->save();
        return back()->with('status', 'Formulario enviado con éxito.');
    }

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
