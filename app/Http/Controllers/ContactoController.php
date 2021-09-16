<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ContactoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $mensaje = DB::table('contacto')
        ->where('id_pagina','=',auth()->user()->current_page)
        ->get();

    

        return view('admin.contacto.index',compact('mensaje'));
    }
}
