<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigMenu;
use App\Models\ConfigItem;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

class ConfigMenuController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $pagina = DB::table('users')
        ->where('current_page','=',auth()->user()->current_page)
        ->first();

        $current_page = $pagina->{'current_page'};
        
        $dato_pagina = DB::table('pagina')
        ->where('id','=',auth()->user()->current_page)
        ->first();

        $dominio = $dato_pagina->{'dominio'};

        $menu = DB::table('config_menu')
        ->where('id_pagina','=',$current_page)
        ->first();

        $entradas = DB::table('entrada')
        ->where('id_pagina','=',auth()->user()->current_page)
        ->get();

        $items = DB::table("config_item")
        ->where('id_menu','=',$menu->{'id'})
        ->get();

        return view('admin.menu.index',compact('menu','items','dominio','entradas'));
    }

    public function update(Request $request, $id){
        $validate = $this->validate($request, [
            'titulo' => 'required|max:250',
            'color' => 'required|max:50',
            'background' => 'required|max:50',
        ]);

        $menu = ConfigMenu::findOrFail($id);
        $menu->titulo = $request->get('titulo');
        $menu->color = $request->get('color');
        $menu->background = $request->get('background');
        $menu->update();

        Session::flash('succes', 'Se guardo la configuracion');
        return Redirect::to('admin/configuracion/menu');
    }

    public function store(Request $request){
        $validate = $this->validate($request, [
            'titulo' => 'required|max:250',
            'enlace' => 'required|max:50',
            'icono' => 'required|max:50',
        ]);
        $item = new ConfigItem;
        $item->titulo = $request->get('titulo');
        $item->enlace = $request->get('enlace');
        $item->icono = $request->get('icono');
        $item->id_menu = $request->get('id_menu');
        $item->save();

        Session::flash('succes', 'Se guardo la configuracion');
        return Redirect::to('admin/configuracion/menu');
    }

    public function edit_item($id){
        $pagina = DB::table('users')
        ->where('current_page','=',auth()->user()->current_page)
        ->first();

        $current_page = $pagina->{'current_page'};

        $menu = DB::table('config_menu')
        ->where('id_pagina','=',$current_page)
        ->first();
        $item = ConfigItem::findOrFail($id);
        return view('admin.menu.edit',compact('item','menu'));
    }

    public function update_item(Request $request, $id){
        $validate = $this->validate($request, [
            'titulo' => 'required|max:250',
            'enlace' => 'required|max:50',
            'icono' => 'required|max:50',
        ]);
        $item = ConfigItem::findOrFail($id);
        $item->titulo = $request->get('titulo');
        $item->enlace = $request->get('enlace');
        $item->icono = $request->get('icono');
        $item->id_menu = $request->get('id_menu');
        
        $item->update();

        Session::flash('succes', 'Se guardo la configuracion');
        return Redirect::to('admin/configuracion/menu');
    }

    public function destroy($id){
        $item = ConfigItem::findOrFail($id);
        $item->delete();

        Session::flash('succes', 'Se elimino icono');
        return Redirect::to('admin/configuracion/menu');
    }
}
