<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;

use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('userstatus');
        $this->middleware('userpermissions');
        $this->middleware('isadmin');
    }

    public function getUsers(Request $request, $status){
        if($status=='all'){
            if ($request){
                $query=trim($request->get('searchText'));
                $users=DB::table('users')
                -> where('name','LIKE','%'.$query.'%')
                -> orwhere('lastname','LIKE','%'.$query.'%')
                -> orderBy('id','Desc')
                -> paginate(20);
            }
        }
        else{
                if ($request){
                    $query=trim($request->get('searchText'));
                    $users=DB::table('users')
                    -> where('status','=', $status)
                    
                    -> orderBy('id','Desc')
                    -> paginate(20);
                }
            }
        return view ('admin.users.home', ["users"=>$users,"searchText"=>$query]);
    }   
       

    public function getUsersEdit($id){
        $users=User::findOrFail($id);
        $data = ['users'=> $users];
        return view('admin.users.edit', $data);
        //return view('admin.users.edit');
    }

    public function getUsersBanned($id){
        $users=User::findOrFail($id);
        if($users->status=="100"){
            $users->status='1';
        } else {
            $users->status='100';
        }
        $users->save();
        return Redirect::to('/admin/users/'.$id.'/edit');

    }

    public function getUsersPermissions($id){
        $users=User::findOrFail($id);
        $data = ['users'=> $users];
        return view('admin.users.permissions', $data);
    }

    public function postUsersPermissions(Request $request, $id){
        $users = User::findOrFail($id);
        $permissions = [
            'dashboard' => $request->input('dashboard'),
            'dashboardStatsUsers' => $request->input('dashboardStatsUsers'),
            'dashboardTraffic' => $request->input('dashboardTraffic'),
            'dashboardStatsSells' => $request->input('dashboardStatsSells'),
            'users' => $request->input('users'),
            'usersEdit' => $request->input('usersEdit'),
            'usersBanned' => $request->input('usersBanned'),
            'usersPermissions' => $request->input('usersPermissions'),
            'products' => $request->input('products'),
            'productsAdd' => $request->input('productsAdd'),
            'productsEdit' => $request->input('productsEdit'),
            'productsDelete' => $request->input('productsDelete'),
            'productsGallery' => $request->input('productsGallery'),
            'categories' => $request->input('categories'),
            'categoriesAdd' => $request->input('categoriesAdd'),
            'categoriesEdit' => $request->input('categoriesEdit'),
            'categoriesDelete' => $request->input('categoriesDelete'),
            'animals' => $request->input('animals'),
            'animalsAdd' => $request->input('animalsAdd'),
            'animalsEdit' => $request->input('animalsEdit'),
            'animalsDelete' => $request->input('animalsDelete'),
            'publications' => $request->input('publications'),
            'publicationsAdd' => $request->input('publicationsAdd'),
            'publicationsEdit' => $request->input('publicationsEdit'),
            'publicationsDelete' => $request->input('publicationsDelete'),
            'volunteer' => $request->input('volunteer'),
            'volunteerEdit' => $request->input('volunteerEdit'),
            'volunteerDelete' => $request->input('volunteerDelete'),
            'volunteerActive' => $request->input('volunteerActive'),
            'home' => $request->input('home'),
            'homeEdit' => $request->input('homeEdit'),
            'homeDelete' => $request->input('homeDelete'),
            'homeActive' => $request->input('homeActive'),
            'collaborator' => $request->input('collaborator'),
            'collaboratorEdit' => $request->input('collaboratorEdit'),
            'collaboratorDelete' => $request->input('collaboratorDelete'),
            'collaboratorActive' => $request->input('collaboratorActive'),
            'adoption' => $request->input('adoption'),
            'adoptionEdit' => $request->input('adoptionEdit'),
            'adoptionDelete' => $request->input('adoptionDelete'),
            'adoptionActive' => $request->input('adoptionActive'),
            
        ];
        $permissions = json_encode($permissions);
        $users->permissions=$permissions;
        if($users->save()){
            return back()->with('status', 'Los permisos fueron actualizados correctamente');

        } else{
            return back()->with('alert', 'Los permisos fueron denegados');
        }


    }

    public function postUsersEdit(Request $request, $id){
        $users=User::findOrFail($id);
        $users->role = $request->input('role');
        if($request->input('role') == "1"){
            if(is_null($users->permissions)){
                 $permissions = [
                    'dashboard' => true,
                ];
                $permissions = json_encode($permissions);
                $users->permissions = $permissions;
            }
        } else {
            $users->permissions = null;
        }

        if($users->save()){
            if ($request->input('role') == "1") {
                return redirect('/admin/users/'.$users->id.'/permissions')->with('status', 'El rango del usuario se actualizó con éxito');
            }else {
                return back()->with('status', 'El rango del usuario se actualizó con éxito');
            }
        }

       
    }
}
