<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Str;

class EntradaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $entradas = DB::table('entrada')
        ->where('id_pagina','=',auth()->user()->current_page)
        ->get();

        return view('admin.entrada.index', compact('entradas'));
    }

    public function create(){
        return view('admin.entrada.create');
    }

    public function store(Request $request){
        $validate = $this->validate($request, [
            'titulo' => 'required|max:150|unique:entrada',
            'contenido' => 'required'
        ]);
        $entrada = new Entrada;
        $entrada->slug = Str::slug($request->get('titulo'),'_');
        $entrada->titulo = $request->get('titulo');
        $entrada->contenido = $request->get('contenido');
        $entrada->id_pagina = auth()->user()->current_page;
        $entrada->save();

        return Redirect::to('admin/entrada');
    }

    public function edit($id){
        $entrada = Entrada::findOrFail($id);
        return view('admin.entrada.edit',compact('entrada'));
    }

    public function update(Request $request,$id){
        $validate = $this->validate($request, [
            'titulo' => 'required|max:150',
            'contenido' => 'required'
        ]);
        $entrada = Entrada::findOrFail($id);
        $entrada->slug = Str::slug($request->get('titulo'),'_');
        $entrada->titulo = $request->get('titulo');
        $entrada->contenido = $request->get('contenido');
        $entrada->id_pagina = auth()->user()->current_page;
        $entrada->update();

        return Redirect::to('admin/entrada');
    }

    public function destroy($id){
        $entrada = Entrada::findOrFail($id);
        $entrada->delete();

        return Redirect::to('admin/entrada');
    }
}
