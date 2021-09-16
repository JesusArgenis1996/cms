<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Redirect;


class RegistroController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $validate = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = new User;
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=bcrypt($request->get('password'));
        $user->role = 'USUARIO';
        $user->save();
        Session::flash('succes', 'Se registro usuario correctamente');
        return Redirect::to('');
    }
}
