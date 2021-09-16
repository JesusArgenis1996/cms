<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pagina;
use App\Models\SeccionUno;
use App\Models\SeccionDos;
use App\Models\ConfigMenu;
use App\Models\ConfigItem;
use App\Models\ConfigGeneral;
use App\Models\ConfigFooter;
use App\Models\Slider;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Redirect;

class PaginaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $data_paginas = DB::table('pagina')
        ->where('id_user','=',auth()->user()->id)
        ->orderby('id','desc')
        ->get();
        return view('admin.pagina.index',compact('data_paginas'));
    }

    public function create(){
        $plantillas = DB::table('plantilla')
        ->orderby('id','asc')
        ->take(3)->get();
        return view('admin.pagina.create', compact('plantillas'));
    }

    public function store(Request $request){
        $validate = $this->validate($request, [
            'dominio' => 'required|unique:pagina|regex:/^[0-9a-zA-Z\s]+$/u',
            'id_plantilla' => 'required|'
        ]);

        $pagina = new Pagina;
        $pagina->dominio=$request->get('dominio');
        $pagina->id_plantilla=$request->get('id_plantilla');
        $pagina->id_user=auth()->user()->id;
        $pagina->estado = 'activo';
        $pagina->save();

        $seccion_uno = new SeccionUno;
        $seccion_uno->titulo = "Titulo de mi seccion";
        $seccion_uno->descripcion = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, nulla! Necessitatibus quod error a architecto cum odit distinctio fugiat voluptates voluptate suscipit. Deserunt harum, eligendi sunt ullam commodi voluptas porro?";
        $seccion_uno->imagen = "default_seccion_uno.jpg";
        $seccion_uno->id_pagina = $pagina->id;
        $seccion_uno->save();

        $seccion_dos = new SeccionDos;
        $seccion_dos->titulo = "Titulo de mi seccion";
        $seccion_dos->descripcion = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, nulla! Necessitatibus quod error a architecto cum odit distinctio fugiat voluptates voluptate suscipit. Deserunt harum, eligendi sunt ullam commodi voluptas porro?";
        $seccion_dos->imagen = "default_seccion_dos.jpg";
        $seccion_dos->id_pagina = $pagina->id;
        $seccion_dos->save();

        $menu = new ConfigMenu;
        $menu->color = "#fff";
        $menu->background = "#2471A3";
        $menu->titulo = 'Titulo de la pagina';
        $menu->id_pagina= $pagina->id;
        $menu->save();

        $general = new ConfigGeneral;
        $general->fuente = "Arial";
        $general->size = "10px";
        $general->logo = 'default_logo.png';
        $general->fondo_principal = 'principal_default.jpg';
        $general->titulo = 'Titulo de pestana';
        $general->favicon = 'default_logo.png';
        $general->mapa ='<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6719.402706820776!2d-115.4895456074402!3d32.6407756618183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1618357253732!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
        $general->id_pagina= $pagina->id;
        $general->save();

        $item = new ConfigItem;
        $item->titulo = "Inicio";
        $item->enlace = 'http://127.0.0.1:8000/'.$request->get('dominio');
        $item->icono = '<i class="fas fa-home"></i>';
        $item->id_menu = $menu->id;
        $item->save();

        $footer = new ConfigFooter;
        $footer->color = "fff";
        $footer->background = "2471A3";
        $footer->cr = 'Derechos reservados a titulo de pagina';
        $footer->direccion = "Mi direccion";
        $footer->telefono = "123455667";
        $footer->correo = "micorreo@example.com";
        $footer->horario = "Mis horarios de atencion";
        $footer->id_pagina= $pagina->id;
        $footer->save();

        $slider1 = new Slider;
        $slider1->titulo = "Mi primer slider1";
        $slider1->imagen = "slider1.jpg";
        $slider1->id_pagina = $pagina->id;
        $slider1->save();

        $slider2 = new Slider;
        $slider2->titulo = "Mi primer slider2";
        $slider2->imagen = "slider2.jpg";
        $slider2->id_pagina = $pagina->id;
        $slider2->save();
        
        $slider3 = new Slider;
        $slider3->titulo = "Mi primer slider3";
        $slider3->imagen = "slider3.jpg";
        $slider3->id_pagina = $pagina->id;
        $slider3->save();


        Session::flash('succes','Se registro tu pagina con exito');
        return Redirect::to('admin/paginas');
    }

    public function update(Request $request,$id){
        $validate = $this->validate($request, [
            'dominio' => 'required|unique:pagina|regex:/^[0-9a-zA-Z\s]+$/u',
        ]);

        $pagina = Pagina::findOrFail($id);
        $pagina->dominio=$request->get('dominio');
        $pagina->update();

        Session::flash('succes','Se registro tu pagina con exito');
        return Redirect::to('admin/paginas');
    }

    public function destroy($id){
        $pagina = Pagina::findOrFail($id);
        $pagina->delete();

        Session::flash('succes', "se elimino su pagina con exito");
        return Redirect::to('admin/paginas');

    }

    public function change_theme(){
        $pagina = DB::table('pagina')
        ->where('id','=',auth()->user()->current_page)
        ->first();

        $plantillas = DB::table('plantilla')
        ->get();
        return view('admin.pagina.change_theme',compact('plantillas','pagina'));
    }

    public function update_theme(Request $request){
        $pagina = Pagina::findOrFail(auth()->user()->current_page);
        $pagina->id_plantilla = $request->get('id_plantilla');
        $pagina->update();
        
        return Redirect::to("admin/change/plantillas");
    }

    public function current_page(Request $request, $id){
        $user = User::findOrFail($id);
        $user->current_page = $request->get('current_page');
        $user->update();
        return Redirect::to('admin/paginas');

    }
}
