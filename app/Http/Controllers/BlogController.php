<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    public function index(){
        $blog = DB::table('blog')
        ->where('id_pagina','=',auth()->user()->current_page)
        ->get();

        return view('admin.blog.index', compact('blog'));
    }

    public function create(){
        return view('admin.blog.create');
    }

    public function store(Request $request){
        $validate = $this->validate($request, [
            'titulo' => 'required|max:250|unique:blog',
            'excerpt' => 'required|max:800',
            'contenido' => 'required',
            'imagen' => 'mimes:jpeg,bmp,jpg,png|max:5000',
        ]);
        $blog = new Blog;
        $blog->slug = Str::slug($request->get('titulo'),'_');
        $blog->titulo = $request->get('titulo');
        $blog->excerpt = $request->get('excerpt');
        $blog->contenido = $request->get('contenido');
        if ($request->hasFile('imagen')) {
            $file=$request->file('imagen');
            $file->move(public_path().'/blog',time().".".$file->getClientOriginalExtension());
            $blog->imagen=time().".".$file->getClientOriginalExtension();
        } 
        $blog->id_pagina = auth()->user()->current_page;
    
        $blog->save();

        return Redirect::to('admin/blog');
    }

    public function edit($id){
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit',compact('blog'));
    }

    public function update(Request $request,$id){
        $validate = $this->validate($request, [
            'titulo' => 'required|max:250|unique:blog',
            'excerpt' => 'required|max:800',
            'contenido' => 'required',
            'imagen' => 'mimes:jpeg,bmp,jpg,png|max:5000',
        ]);
        $blog = Blog::findOrFail($id);
        $blog->slug = Str::slug($request->get('titulo'),'_');
        $blog->titulo = $request->get('titulo');
        $blog->excerpt = $request->get('excerpt');
        $blog->contenido = $request->get('contenido');
        if ($request->hasFile('imagen')) {
            $file=$request->file('imagen');
            $file->move(public_path().'/blog',time().".".$file->getClientOriginalExtension());
            $blog->imagen=time().".".$file->getClientOriginalExtension();
        } 
        $blog->id_pagina = auth()->user()->current_page;
        
        $blog->update();

        return Redirect::to('admin/blog');
    }

    public function destroy($id){
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return Redirect::to('admin/blog');
    }
}
