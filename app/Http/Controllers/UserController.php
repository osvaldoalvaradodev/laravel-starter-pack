<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\User;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{    
    
    public function list(){
        return view('users.list');
    }

    function getdata(){
        $users = User::all();
        return DataTables::of($users)->make(true);
    }

    public function add(){
        $user = new User;
        return view('users.form',compact('user'));
    }

    public function edit($user_id){
        $user = User::findOrFail($user_id);
        return view('users.form',compact('user'));
    }
    
    public function store(Request $request){
        $id = $request->id;
        if($id){
            //Si encuentra el ID edita
            $user = User::findOrFail($id);
            $user->name =  $request->name;
            $user->email =  $request->email;
            if($request->newpassword){
                $user->password = bcrypt($request->password);
            }
            $user->save();
            return redirect()->route('users.list')->with('success', 'Usuario editado correctamente');
        }else{
            //Si no, Crea un Item        
            $user = new User;
            $user->fill($request->all());
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('users.list')->with('success', 'Usuario creado correctamente');
        }
    }

    public function delete($user_id)
    {
        try {
            $user = User::findOrFail($user_id);
            $user->email=null;
            $user->enabled=0;
            $user->save();
            return redirect()->route('users.list')->with('success', 'Usuario eliminado correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('users.list')->with('error', 'Problema al eliminar usuario');
        }
    }

    public function changePassword(){
        //busca el usuario en la bd
        $user = Auth::user();
        return view('users.passwordchange' , compact('user'));
    }

    public function changePasswordProcess(Request $request){

        $user = Auth::user();
        $oldpassword = $request->oldpassword;

        if(Hash::check($oldpassword,$user->password)){
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
            $user->update($input);

            $userAutentificated = Auth::loginUsingId($user->id);
            return back()->with('success', 'Contraseña cambiada correctamente');
        }else{
            return back()->with('error','La clave antigua no corresponde')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}