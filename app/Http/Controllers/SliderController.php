<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
class SliderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $slider = DB::table('slider')
        ->where('id_pagina','=',auth()->user()->current_page)
        ->get();

        return view('admin.slider.index', compact('slider'));
    }

    public function create(){
        return view('admin.slider.create');
    }

    public function store(Request $request){
        $validate = $this->validate($request, [
            'titulo' => 'required|max:150',
            'imagen' => 'required|mimes:jpeg,bmp,jpg,png|max:5000',
        ]);
        $slider = new Slider;
        $slider->titulo = $request->get('titulo');
        if ($request->hasFile('imagen')) {
            $file=$request->file('imagen');
            $file->move(public_path().'/sliders',time().".".$file->getClientOriginalExtension());
            $slider->imagen=time().".".$file->getClientOriginalExtension();
        } 
        $slider->id_pagina = auth()->user()->current_page;
    
        $slider->save();

        return Redirect::to('admin/slider');
    }

    public function edit($id){
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('slider'));
    }

    public function update(Request $request,$id){
        $validate = $this->validate($request, [
            'titulo' => 'required|max:150',
            'imagen' => 'mimes:jpeg,bmp,jpg,png|max:5000',
        ]);
        $slider = Slider::findOrFail($id);
        $slider->titulo = $request->get('titulo');
        if ($request->hasFile('imagen')) {
            $file=$request->file('imagen');
            $file->move(public_path().'/sliders',time().".".$file->getClientOriginalExtension());
            $slider->imagen=time().".".$file->getClientOriginalExtension();
        } 
        $slider->id_pagina = auth()->user()->current_page;
    
        $slider->update();

        return Redirect::to('admin/slider');
    }

    public function destroy($id){
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return Redirect::to('admin/slider');
    }
}
