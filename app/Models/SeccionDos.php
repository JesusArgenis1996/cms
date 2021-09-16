<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeccionDos extends Model
{
    protected $table = "seccion_dos";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[
        'id_pagina',
        'imagen',
        'descripcion',
        'titulo',
    ];

    use HasFactory;
}
