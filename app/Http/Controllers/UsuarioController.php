<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use \App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class UsuarioController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index(){
        $users = User::all();
        $usersAdmin = Admin::all();
        return view('usuarios.index', compact('users', 'usersAdmin'));
    }
    public function create(){
        //
    }
    public function store(Request $request){
        $user = User::find($request->user);
        $role = $request->role[0];

        $emailUser = $user->email;
        $nameUser = $user->name;
        $passUser = $user->password;
        //dd($passUser);
        //$emailUser = "diego@diego.com";
        
        //dd($userAdmin);

        //dd($user);
        //dd($role);
        //var_dump($user);
        if (isset($user)) {

            if($role == 'admin'){
                if(($userAdmin = Admin::where("email", $emailUser)->first()) == null){
                    $userAdmin = Admin::create([
                        'name' => $nameUser,
                        'email' => $emailUser,
                        'password' => $passUser,
                    ]);
                }
                $userAdmin->assignRole($role);
                $userAdmin->save();
            }
            else{
                $user->syncRoles($request->role);
                $user->save();
            }
            
            
            
        }
        return redirect()->route('usuarios.index');
    }
    public function show($id){
        $user = User::find($id);
        $userAdmin = Admin::find($id);
        $roles = Role::all();
        return view('usuarios.show', compact('roles', 'user', 'userAdmin'));
    }
    public function edit(){
        //
    }
    public function update(){
        //
    }
    public function destroy(){
        //
    }
}
