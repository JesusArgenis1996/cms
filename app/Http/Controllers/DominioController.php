<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Contacto;
use Illuminate\Support\Facades\Redirect;
class DominioController extends Controller
{
    public function open_page($dominio){
        $pagina = DB::table('pagina')
        ->where('dominio','=',$dominio)
        ->first();

        if(!$pagina){
            abort('404');
        }else{
            $id_pagina = $pagina->{'id'};
            $id_plantilla = $pagina->{'id_plantilla'};
            
            $menu = DB::table('config_menu')
            ->where('id_pagina','=',$id_pagina)
            ->first();
            
            $id_menu = $menu->{'id'};
            

            $items_menu = DB::table('config_item')
            ->where('id_menu','=',$id_menu)
            ->get();

            $general = DB::table('config_general')
            ->where('id_pagina','=',$id_pagina)
            ->first(); 

            $footer = DB::table('config_footer')
            ->where('id_pagina','=',$id_pagina)
            ->first(); 

            $entrada = DB::table('entrada')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $equipo = DB::table('equipo')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $enlace = DB::table('enlace')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $galeria_index = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->take(4)
            ->get();

            $galeria_footer = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->take(6)
            ->get();

            $seccion_uno = DB::table('seccion_uno')
            ->where('id_pagina','=',$id_pagina)
            ->first();

            $seccion_dos = DB::table('seccion_dos')
            ->where('id_pagina','=',$id_pagina)
            ->first();

            $slider = DB::table('slider')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $blog = DB::table('blog')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $blog_index = DB::table('blog')
            ->where('id_pagina','=',$id_pagina)
            ->take(3)
            ->get();

            return view('plantillas.'.$id_plantilla.'.index', compact('menu','items_menu','general','footer','entrada','equipo','enlace',
            'seccion_uno','seccion_dos','slider','blog','galeria_index','galeria_footer','blog_index'));
        }
    }
    public function open_galeria($dominio){
        $pagina = DB::table('pagina')
        ->where('dominio','=',$dominio)
        ->first();

        if(!$pagina){
            abort('404');
        }else{
            $id_pagina = $pagina->{'id'};
            $id_plantilla = $pagina->{'id_plantilla'};
            
            $menu = DB::table('config_menu')
            ->where('id_pagina','=',$id_pagina)
            ->first();
            
            $id_menu = $menu->{'id'};
            

            $items_menu = DB::table('config_item')
            ->where('id_menu','=',$id_menu)
            ->get();

            $general = DB::table('config_general')
            ->where('id_pagina','=',$id_pagina)
            ->first(); 

            $footer = DB::table('config_footer')
            ->where('id_pagina','=',$id_pagina)
            ->first(); 

            $entrada = DB::table('entrada')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $equipo = DB::table('equipo')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $enlace = DB::table('enlace')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $galeria_index = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->take(4)
            ->get();

            $galeria = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->paginate(6);

            $galeria_footer = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->take(6)
            ->get();

            $seccion_uno = DB::table('seccion_uno')
            ->where('id_pagina','=',$id_pagina)
            ->first();

            $seccion_dos = DB::table('seccion_dos')
            ->where('id_pagina','=',$id_pagina)
            ->first();

            $slider = DB::table('slider')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $blog = DB::table('blog')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            return view('plantillas.'.$id_plantilla.'.galeria', compact('menu','items_menu','general','footer','entrada','equipo','enlace',
            'seccion_uno','seccion_dos','slider','blog','galeria_index','galeria','galeria_footer'));
        }
    }

    public function open_blog($dominio){
        $pagina = DB::table('pagina')
        ->where('dominio','=',$dominio)
        ->first();

        if(!$pagina){
            abort('404');
        }else{
            $id_pagina = $pagina->{'id'};
            $id_plantilla = $pagina->{'id_plantilla'};
            
            $menu = DB::table('config_menu')
            ->where('id_pagina','=',$id_pagina)
            ->first();
            
            $id_menu = $menu->{'id'};
            

            $items_menu = DB::table('config_item')
            ->where('id_menu','=',$id_menu)
            ->get();

            $general = DB::table('config_general')
            ->where('id_pagina','=',$id_pagina)
            ->first(); 

            $footer = DB::table('config_footer')
            ->where('id_pagina','=',$id_pagina)
            ->first(); 

            $entrada = DB::table('entrada')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $equipo = DB::table('equipo')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $enlace = DB::table('enlace')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $galeria_index = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->take(4)
            ->get();

            $galeria = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->paginate(6);

            $galeria_footer = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->take(6)
            ->get();

            $seccion_uno = DB::table('seccion_uno')
            ->where('id_pagina','=',$id_pagina)
            ->first();

            $seccion_dos = DB::table('seccion_dos')
            ->where('id_pagina','=',$id_pagina)
            ->first();

            $slider = DB::table('slider')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $blog = DB::table('blog')
            ->where('id_pagina','=',$id_pagina)
            ->paginate(3);
            
            return view('plantillas.'.$id_plantilla.'.blog', compact('menu','items_menu','general','footer','entrada','equipo','enlace',
            'seccion_uno','seccion_dos','slider','blog','galeria_index','galeria','galeria_footer'));
        }
    }
    public function open_blog_single($dominio,$slug){
        $pagina = DB::table('pagina')
        ->where('dominio','=',$dominio)
        ->first();

        if(!$pagina){
            abort('404');
        }else{
            $id_pagina = $pagina->{'id'};
            $id_plantilla = $pagina->{'id_plantilla'};
            
            $menu = DB::table('config_menu')
            ->where('id_pagina','=',$id_pagina)
            ->first();
            
            $id_menu = $menu->{'id'};
            

            $items_menu = DB::table('config_item')
            ->where('id_menu','=',$id_menu)
            ->get();

            $general = DB::table('config_general')
            ->where('id_pagina','=',$id_pagina)
            ->first(); 

            $footer = DB::table('config_footer')
            ->where('id_pagina','=',$id_pagina)
            ->first(); 

            $entrada = DB::table('entrada')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $equipo = DB::table('equipo')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $enlace = DB::table('enlace')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $galeria_index = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->take(4)
            ->get();

            $galeria = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->paginate(6);

            $galeria_footer = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->take(6)
            ->get();

            $seccion_uno = DB::table('seccion_uno')
            ->where('id_pagina','=',$id_pagina)
            ->first();

            $seccion_dos = DB::table('seccion_dos')
            ->where('id_pagina','=',$id_pagina)
            ->first();

            $slider = DB::table('slider')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $blog = DB::table('blog')
            ->where('slug','=',$slug)
            ->first();

            return view('plantillas.'.$id_plantilla.'.blog_single', compact('menu','items_menu','general','footer','entrada','equipo','enlace',
            'seccion_uno','seccion_dos','slider','blog','galeria_index','galeria','galeria_footer'));
        }
    }

    public function open_contacto($dominio){
        $pagina = DB::table('pagina')
        ->where('dominio','=',$dominio)
        ->first();

        if(!$pagina){
            abort('404');
        }else{
            $id_pagina = $pagina->{'id'};
            $id_plantilla = $pagina->{'id_plantilla'};
            
            $menu = DB::table('config_menu')
            ->where('id_pagina','=',$id_pagina)
            ->first();
            
            $id_menu = $menu->{'id'};
            

            $items_menu = DB::table('config_item')
            ->where('id_menu','=',$id_menu)
            ->get();

            $general = DB::table('config_general')
            ->where('id_pagina','=',$id_pagina)
            ->first(); 

            $footer = DB::table('config_footer')
            ->where('id_pagina','=',$id_pagina)
            ->first(); 

            $entrada = DB::table('entrada')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $equipo = DB::table('equipo')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $enlace = DB::table('enlace')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $galeria_index = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->take(4)
            ->get();

            $galeria = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->paginate(6);

            $galeria_footer = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->take(6)
            ->get();

            $seccion_uno = DB::table('seccion_uno')
            ->where('id_pagina','=',$id_pagina)
            ->first();

            $seccion_dos = DB::table('seccion_dos')
            ->where('id_pagina','=',$id_pagina)
            ->first();

            $slider = DB::table('slider')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $blog = DB::table('blog')
            ->where('id_pagina','=',$id_pagina)
            ->paginate(3);

            return view('plantillas.'.$id_plantilla.'.contacto', compact('menu','items_menu','general','footer','entrada','equipo','enlace',
            'seccion_uno','dominio','seccion_dos','slider','blog','galeria_index','galeria','galeria_footer','id_pagina'));
        }

    }
    public function store_contacto($dominio, Request $request){
        $validate = $this->validate($request, [
            'nombres' => 'required|max:250',
            'correo' => 'required|max:100|email',
            'telefono' => 'required|max:10|min:0',
            'mensaje' => 'required|max:800',
        ]);
        $contacto = new Contacto;
        $contacto->nombres = $request->get('nombres');
        $contacto->correo = $request->get('correo');
        $contacto->telefono = $request->get('telefono');
        $contacto->mensaje = $request->get('mensaje');
        $contacto->id_pagina = $request->get('id_pagina');
        $contacto->save();

        return Redirect::to('http://127.0.0.1:8000/'.$dominio.'/contenido/pagina/contacto');
    }

    public function open_entrada($dominio,$slug){
        $pagina = DB::table('pagina')
        ->where('dominio','=',$dominio)
        ->first();

        if(!$pagina){
            abort('404');
        }else{
            $id_pagina = $pagina->{'id'};
            $id_plantilla = $pagina->{'id_plantilla'};
            
            $menu = DB::table('config_menu')
            ->where('id_pagina','=',$id_pagina)
            ->first();
            
            $id_menu = $menu->{'id'};
            

            $items_menu = DB::table('config_item')
            ->where('id_menu','=',$id_menu)
            ->get();

            $general = DB::table('config_general')
            ->where('id_pagina','=',$id_pagina)
            ->first(); 

            $footer = DB::table('config_footer')
            ->where('id_pagina','=',$id_pagina)
            ->first(); 

            $entrada = DB::table('entrada')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $equipo = DB::table('equipo')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $enlace = DB::table('enlace')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $galeria_index = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->take(4)
            ->get();

            $galeria = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->paginate(6);

            $galeria_footer = DB::table('galeria')
            ->where('id_pagina','=',$id_pagina)
            ->take(6)
            ->get();

            $seccion_uno = DB::table('seccion_uno')
            ->where('id_pagina','=',$id_pagina)
            ->first();

            $seccion_dos = DB::table('seccion_dos')
            ->where('id_pagina','=',$id_pagina)
            ->first();

            $slider = DB::table('slider')
            ->where('id_pagina','=',$id_pagina)
            ->get();

            $entrada = DB::table('entrada')
            ->where('slug','=',$slug)
            ->first();

            return view('plantillas.'.$id_plantilla.'.entrada', compact('menu','items_menu','general','footer','entrada','equipo','enlace',
            'seccion_uno','seccion_dos','slider','entrada','galeria_index','galeria','galeria_footer'));
        }
    }
}
