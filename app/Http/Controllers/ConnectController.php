<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Auth, Mail, Str;
use App\Mail\UserSendRecover;
use App\Mail\UserSendNewPassword;

class ConnectController extends Controller
{

    public function __construct(){
        $this->middleware('guest')->except(['getLogout']);
    }

    public function getLogin(){
        return view ('connect.login');
    }

    public function postLogin(Request $request){
        $rules =[
            'email'=> 'required|email',
            'password'=>'required|min:8',
        ];

        $messages = [
            'email.required' => 'Su correo electrónico es requerido.',
            'email.email' => 'El formato de su correo electrónico es inválido.',
            'password.required' => 'Por favor escriba una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caractéres.',
        ];

        $this->validate($request, $rules, $messages);

        if (Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')], true)) {
           if( Auth::User()->status=="100") {
            return redirect()->intended('/logout');
           }
           else{
            // Authentication passed...
            return redirect()->intended('/'); }
        }
        else{
            return back() -> with ('alert', 'Correo electrónico o contraseña incorrecta.');

        }
        

    }

    public function getLogout(){
        $status=Auth::User()->status;
        Auth::logout();
        if($status=="100"){
            return redirect('/login')->with('alert', 'Su usuario ha sido suspendido');
        }
        else{
            return redirect('/');
        }
        
    }

    public function getRegister(){
        return view ('connect.register');
    }

    public function postRegister(Request $request){
        $rules =[
            'name'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=>'required|min:8',
            'cpassword'=>'required|min:8|same:password',
        ];

        $messages = [
            'name.require' => 'Su nombre es requerido.',
            'lastname.required'=> 'Su apellido es requerido.',
            'email.required' => 'Su correo electrónico es requerido.',
            'email.email' => 'El formato de su correo electrónico es inválido.',
            'email.unique' => 'Ya existe un usuario registrado con este correo electrónico.',
            'password.required' => 'Por favor escriba una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caractéres.',
            'c.password.required' => 'Es necesario confirmar la contraseña ingresada.',
            'cpassword.min' => 'La confirmación de contraseña debe tener al menos 8 caractéres.',
            'cpassword.same' => 'Las contraseñas no coinciden.',

        ];
        $this->validate($request, $rules, $messages);

        $user = new User;
        $user -> name = e($request-> input ('name'));
        $user -> lastname = e($request-> input ('lastname'));
        $user -> email = e($request-> input ('email'));
        $user -> password = Hash::make($request-> input ('password'));
        $user -> save ();
        return Redirect::to('/login')->with('status', 'Usuario creado, inicie sesión para comenzar');

    }

    public function getRecover(){
        return view ('connect.recover');
    }

    public function postRecover(Request $request){
        $rules =[
            'email'=> 'required|email',
        ];

        $messages = [

            'email.required' => 'Su correo electrónico es requerido.',
            'email.email' => 'El formato de correo electrónico es inválido.',
            
        ];

        $this->validate($request, $rules, $messages);

        $user = User::where('email', '=', $request->input('email'))->count();
        if($user=="1"){
            $user = User::where('email', '=', $request->input('email'))->first();
            $code = rand(100000,999999);
            $data = ['name'=>$user->name, 'lastname'=>$user->lastname, 'email'=>$user->email, 'code'=>$code ];
            $u = User::findOrFail($user->id);
            $u -> password_code = $code;
            if ($u->save()){}
            Mail::to($user->email)->send(new UserSendRecover($data));
            return redirect('/reset?email='.$user->email)->with('status', 'Ingrese el código de recuperación enviado a su correo electrónico');
            //return view ('emails.recover', $data);

        } else {
            return back()->with('alert', 'Este correo electrónico no existe');
        }
        //return count([$user]);
        
    }

    public function getReset(Request $request){
        $data  = ['email' => $request->get('email')];
        return view('connect.reset', $data);
    }

    public function postReset(Request $request){
        //comparar codigos
        $rules =[
            'email'=> 'required|email',
            'code'=> 'required',
        ];

        $messages = [

            'email.required' => 'Su correo electrónico es requerido.',
            'email.email' => 'El formato de correo electrónico es inválido.',
            'code.required' => 'El código de recuperación es requerido.',
            
        ];

        $this->validate($request, $rules, $messages);

        $user = User::where('email', '=', $request->input('email'))->where('password_code', '=', $request->input('code'))->count();
        if($user=="1"){
            $user = User::where('email', '=', $request->input('email'))->where('password_code', '=', $request->input('code'))->first();
            $new_password=Str::random(8);
            $user->password=Hash::make($new_password);
            $user->password_code=null;
            if($user->save()){
                $datos = ['name'=>$user->name, 'lastname'=>$user->lastname, 'password'=>$new_password];
                Mail::to($user->email)->send(new UserSendNewPassword($datos));
                return redirect('/login')->with('status', 'Contraseña restablecida con éxito, ahora puede iniciar sesión');
            }
            //return $new_password;

        }else{
            return back()->with('alert', 'Correo electrónico o código de recuperación incorrecto');
        }
    }
}
