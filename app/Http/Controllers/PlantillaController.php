<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plantilla;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class PlantillaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $data_plantillas = DB::table('plantilla')
        ->paginate('10');
        return view('panel.plantillas.index', compact('data_plantillas'));
    }

    public function create(){
        return view('panel.plantillas.create');
    }

    public function store(Request $request){
        $validate = $this->validate($request, [
            'titulo' => 'required|max:150',
            'descripcion' => 'required',
            'portada' => 'required|mimes:jpeg,bmp,jpg,png|max:5000',
        ]);
        $plantilla = new Plantilla;
        $plantilla->titulo = $request->get('titulo');
        $plantilla->descripcion = $request->get('descripcion');
    
        if ($request->hasFile('portada')) {
            $file=$request->file('portada');
            $file->move(public_path().'/portadas',time().".".$file->getClientOriginalExtension());
            $plantilla->portada=time().".".$file->getClientOriginalExtension();
        } 
        $plantilla->save();

        Session::flash('succes', 'Se registro su plantilla con exito');
        return Redirect::to('admin/plantillas');
    }
    public function edit($id){
        $plantilla = DB::table('plantilla')
        ->where('id','=',$id)
        ->first();
        return view('panel.plantillas.edit',compact('plantilla'));
    }

    public function update(Request $request, $id){
        $validate = $this->validate($request, [
            'titulo' => 'required|max:150',
            'descripcion' => 'required',
            'portada' => 'mimes:jpeg,bmp,jpg,png|max:5000',
        ]);
        $plantilla = Plantilla::findOrFail($id);
        $plantilla->titulo = $request->get('titulo');
        $plantilla->descripcion = $request->get('descripcion');
    
        if ($request->hasFile('portada')) {
            $file=$request->file('portada');
            $file->move(public_path().'/portadas',time().".".$file->getClientOriginalExtension());
            $plantilla->portada=time().".".$file->getClientOriginalExtension();
        } 
        $plantilla->update();

        Session::flash('succes', 'Se registro su plantilla con exito');
        return Redirect::to('admin/plantillas');
    }

    public function destroy($id){
        $plantilla = Plantilla::findOrFail($id);
        $plantilla->delete();

        Session::flash('succes', "se elimino su plantilla con exito");
        return Redirect::to('admin/plantillas');

    }
}
