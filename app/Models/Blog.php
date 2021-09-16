<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[
        'slug',
        'imagen',
        'titulo',
        'excerpt',
        'contenido',
        'id_pagina'
    ];

    protected $guarded = [

    ];
}
