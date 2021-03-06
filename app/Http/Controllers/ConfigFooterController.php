<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ConfigFooter;
use Illuminate\Support\Facades\Redirect;
use Session;

class ConfigFooterController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $pagina = DB::table('users')
        ->where('current_page','=',auth()->user()->current_page)
        ->first();

        $current_page = $pagina->{'current_page'};

        $footer = DB::table('config_footer')
        ->where('id_pagina','=',$current_page)
        ->first();

        return view('admin.footer.index',compact('footer'));
    }

    public function update_footer(Request $request, $id){
        $validate = $this->validate($request, [
            'color'=>'required|max:50',
            'background'=>'required|max:50',
            'cr'=>'required|max:150',
            'direccion'=>'required|max:250',
            'telefono'=>'required|max:9',
            'correo'=>'required|max:50|email',
            'horario'=>'required|max:50',
        ]);

        $footer = ConfigFooter::findOrFail($id);
        $footer->color = $request->get('color');
        $footer->background = $request->get('background');
        $footer->cr = $request->get('cr');
        $footer->direccion = $request->get('direccion');
        $footer->telefono = $request->get('telefono');
        $footer->correo = $request->get('correo');
        $footer->horario = $request->get('horario');
        
        $footer->update();

        Session::flash('succes','Se actualizo su meno con exito');
        return Redirect::to('admin/configuracion/footer');

    }
}
