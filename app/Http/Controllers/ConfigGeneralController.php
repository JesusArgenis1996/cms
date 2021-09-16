<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ConfigGeneral;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\Redirect;

class ConfigGeneralController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $pagina = DB::table('users')
        ->where('current_page','=',auth()->user()->current_page)
        ->first();

        $current_page = $pagina->{'current_page'};

        $general = DB::table('config_general')
        ->where('id_pagina','=',$current_page)
        ->first();

        
        return view('admin.general.index', compact('general'));
    }
    
    public function update_general(Request $request, $id){
        $validate = $this->validate($request, [
            'titulo'=>'required|max:150',
            'fuente'=>'required|max:150',
            'size'=>'required|max:10',
            'logo'=>'mimes:jpg,png,gif|max:5000',
            'fondo_principal'=>'mimes:jpg,png,gif|max:5000',
            'favicon'=>'mimes:jpg,png,gif|max:5000',
            'mapa'=>'required|max:250',
        ]);

        $general = ConfigGeneral::findOrFail($id);
        $general->titulo = $request->get('titulo');
        $general->fuente = $request->get('fuente');
        $general->mapa = $request->get('mapa');
        $general->size = $request->get('size');
        if ($request->hasFile('logo')) {
            $file=$request->file('logo');
            $file->move(public_path().'/general',time().".".$file->getClientOriginalExtension());
            $general->logo=time().".".$file->getClientOriginalExtension();
        } 
        if ($request->hasFile('fondo_principal')) {
            $file=$request->file('fondo_principal');
            $file->move(public_path().'/general',time().".".$file->getClientOriginalExtension());
            $general->fondo_principal=time().".".$file->getClientOriginalExtension();
        } 
        if ($request->hasFile('favicon')) {
            $file=$request->file('favicon');
            $file->move(public_path().'/general',time().".".$file->getClientOriginalExtension());
            $general->favicon=time().".".$file->getClientOriginalExtension();
        } 
        $general->update();

        Session::flash('succes','Se actualizo su meno con exito');
        return Redirect::to('admin/configuracion/general');
    }
    public function select_fondo(){
        $general = DB::table('config_general')
        ->where('id_pagina','=',auth()->user()->current_page)
        ->first();

        $id_general = $general->{'id'};
        return view('admin.fondo.index',compact('id_general','general'));
    }
    
    public function update_select_fondo(Request $request, $id){
        $general = ConfigGeneral::findOrFail($id);
        $general->fondo = $request->get('fondo');
        $general->update();

        return view('admin.fondo.index');
    }
}
