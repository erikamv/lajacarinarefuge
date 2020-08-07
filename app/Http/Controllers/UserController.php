<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }

    public function getAccountEdit(){
        return view('user.accountEdit');
    }

    public function getAccountHome(){
        //$user=User::where('id','=',$id) -> get();
       // $data = ['user'=>$user];
        return view('user.accountHome');
    }
    public function postAccountEdit(Request $request){
        $rules =[
            'name'=> 'required',
            'lastname'=> 'required',
            'avatar'=> 'required|jpg, jpeg, png',
            'phone'=> 'required',
            'birthday'=> 'required|date',
            'gender'=> 'required',
        ];

        $messages = [

            'name.required' => 'Ingrese su nombre.',
            'lastname.required' => 'Ingrese su apellido.',
            'avatar.required' => 'Ingrese una foto de perfil.',
            'phone.required' => 'Ingrese un contacto.',
            'birthday.required' => 'Ingrese una fecha de nacimiento.',
            'birthday.date' => 'Ingrese una fecha de nacimiento valida.',
            'gender.required' => 'Seleccione su sexo.',
            
        ];

        $this->validate($request, $rules, $messages);

        $user = Auth::user();

        if($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $file->move(public_path().'/static/imagenes/usuarios/',$file->getClientOriginalName());
            $articulo -> imagen = $file -> getClientOriginalName();
        }

       /* if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatarName = time() . $avatar->getClientOriginalName();
            $avatar->move('/static/imagenes/usuarios'.$avatarName);
            $user->avatar=$avatarName;
        }*/

        $user->name=$request->name;
        $user->name=$request->lastname;
        $user->name=$request->phone;
        $user->name=$request->birthday;
        $user->name=$request->name;
        $user->save();
        return redirect('/account');
    }

    public function postAccountPassword(Request $request){
        $rules =[
            'apassword'=> 'required',
            'npassword'=> 'required|min: 8',
            'cpassword'=> 'required|min: 8|same',
            
        ];

        $messages = [

            'apassword.required' => 'Ingrese su contraseña actual.',
            'npassword.required' => 'Ingrese una nueva contraseña.',
            'npassword.min' => 'Al menos debe contener 8 caracteres.',
            'cpassword.required' => 'Confirme su nueva contraseña.',
            'cpassword.min' => 'Al menos debe contener 8 caracteres.',
            'cpassword.same' => 'Las contraseñas no coinciden.',
            
        ];

        $this->validate($request, $rules, $messages);

        $user = Auth::user();
        $user -> password = Hash::make($request-> input ('npassword'));
        $user->save();

        return redirect('/login')->with('status', 'Contraseña actualiza, inicie sesión para comenzar.');
    }
}
