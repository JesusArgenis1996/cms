<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enlace;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class EnlaceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $enlace = DB::table('enlace')
        ->where('id_pagina','=',auth()->user()->current_page)
        ->get();

        return view('admin.enlace.index', compact('enlace'));
    }

    public function create(){
        return view('admin.enlace.create');
    }

    public function store(Request $request){
        $validate = $this->validate($request, [
            'enlace' => 'required|max:150',
            'imagen' => 'mimes:jpeg,bmp,jpg,png|max:5000',
        ]);
        $enlace = new Enlace;
        $enlace->enlace = $request->get('enlace');
        if ($request->hasFile('imagen')) {
            $file=$request->file('imagen');
            $file->move(public_path().'/enlace',time().".".$file->getClientOriginalExtension());
            $enlace->imagen=time().".".$file->getClientOriginalExtension();
        } 
        $enlace->id_pagina = auth()->user()->current_page;
        $enlace->save();

        return Redirect::to('admin/enlace');
    }

    public function edit($id){
        $enlace = Enlace::findOrFail($id);
        return view('admin.enlace.edit',compact('enlace'));
    }

    public function update(Request $request,$id){
        $validate = $this->validate($request, [
            'enlace' => 'required|max:150',
            'imagen' => 'mimes:jpeg,bmp,jpg,png|max:5000',
        ]);
        $enlace = Enlace::findOrFail($id);
        $enlace->enlace = $request->get('enlace');
        if ($request->hasFile('imagen')) {
            $file=$request->file('imagen');
            $file->move(public_path().'/enlace',time().".".$file->getClientOriginalExtension());
            $enlace->imagen=time().".".$file->getClientOriginalExtension();
        } 
        $enlace->id_pagina = auth()->user()->current_page;
        $enlace->update();

        return Redirect::to('admin/enlace');
    }

    public function destroy($id){
        $enlace = Enlace::findOrFail($id);
        $enlace->delete();

        return Redirect::to('admin/enlace');
    }
}
