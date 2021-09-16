<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = "entrada";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[
        'id_pagina',
        'slug',
        'titulo',
        'contenido',
    ];

    use HasFactory;
}
