<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeria;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class GaleriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $galeria = DB::table('galeria')
        ->where('id_pagina','=',auth()->user()->current_page)
        ->get();

        return view('admin.galeria.index', compact('galeria'));
    }

    public function create(){
        return view('admin.galeria.create');
    }

    public function store(Request $request){
        $validate = $this->validate($request, [
            'imagen' => 'mimes:jpeg,bmp,jpg,png|max:5000',
        ]);
        $galeria = new Galeria;
        if ($request->hasFile('imagen')) {
            $file=$request->file('imagen');
            $file->move(public_path().'/galeria',time().".".$file->getClientOriginalExtension());
            $galeria->imagen=time().".".$file->getClientOriginalExtension();
        } 
        $galeria->id_pagina = auth()->user()->current_page;
        $galeria->save();

        return Redirect::to('admin/galeria');
    }

    public function destroy($id){
        $galeria = Galeria::findOrFail($id);
        $galeria->delete();

        return Redirect::to('admin/galeria');
    }
}
