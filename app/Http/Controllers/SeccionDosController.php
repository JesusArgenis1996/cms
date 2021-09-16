<?php

namespace App\Http\Controllers;

use DB;
use App\Models\SeccionDos;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class SeccionDosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $pagina = DB::table('users')
        ->where('current_page','=',auth()->user()->current_page)
        ->first();

        $current_page = $pagina->{'current_page'};

        $seccion = DB::table('seccion_dos')
        ->where('id_pagina','=',$current_page)
        ->first();
        return view('admin.seccion_dos.index', compact('seccion'));
    }
    public function update(Request $request, $id){
        $validate = $this->validate($request, [
            'titulo' => 'required|max:150',
            'descripcion' => 'required',
            'imagen' => 'mimes:jpeg,bmp,jpg,png|max:5000',
        ]);
        $seccion = SeccionDos::findOrFail($id);
        $seccion->titulo = $request->get('titulo');
        $seccion->descripcion = $request->get('descripcion');
        if ($request->hasFile('imagen')) {
            $file=$request->file('imagen');
            $file->move(public_path().'/secciones',time().".".$file->getClientOriginalExtension());
            $seccion->imagen=time().".".$file->getClientOriginalExtension();
        } 
        $seccion->id_pagina = auth()->user()->current_page;
        $seccion->update();

        return Redirect::to('admin/seccion_dos');
    }

}
