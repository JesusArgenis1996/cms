<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class EquipoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $equipo = DB::table('equipo')
        ->where('id_pagina','=',auth()->user()->current_page)
        ->get();

        return view('admin.equipo.index', compact('equipo'));
    }

    public function create(){
        return view('admin.equipo.create');
    }

    public function store(Request $request){
        $validate = $this->validate($request, [
            'nombres' => 'required|max:150',
            'cargo' => 'required|max:150',
            'imagen' => 'mimes:jpeg,bmp,jpg,png|max:5000',
        ]);
        $equipo = new Equipo;
        $equipo->nombres = $request->get('nombres');
        $equipo->cargo = $request->get('cargo');
        if ($request->hasFile('imagen')) {
            $file=$request->file('imagen');
            $file->move(public_path().'/equipo',time().".".$file->getClientOriginalExtension());
            $equipo->imagen=time().".".$file->getClientOriginalExtension();
        } 
        $equipo->id_pagina = auth()->user()->current_page;
    
        $equipo->save();

        return Redirect::to('admin/equipo');
    }

    public function edit($id){
        $equipo = Equipo::findOrFail($id);
        return view('admin.equipo.edit',compact('equipo'));
    }

    public function update(Request $request,$id){
        $validate = $this->validate($request, [
            'nombres' => 'required|max:150',
            'cargo' => 'required|max:150',
            'imagen' => 'mimes:jpeg,bmp,jpg,png|max:5000',
        ]);
        $equipo = Equipo::findOrFail($id);
        $equipo->nombres = $request->get('nombres');
        $equipo->cargo = $request->get('cargo');
        if ($request->hasFile('imagen')) {
            $file=$request->file('imagen');
            $file->move(public_path().'/equipo',time().".".$file->getClientOriginalExtension());
            $equipo->imagen=time().".".$file->getClientOriginalExtension();
        } 
        $equipo->id_pagina = auth()->user()->current_page;
        $equipo->update();

        return Redirect::to('admin/equipo');
    }

    public function destroy($id){
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();

        return Redirect::to('admin/equipo');
    }
}
