<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
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
}
