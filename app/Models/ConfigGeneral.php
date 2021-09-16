<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigGeneral extends Model
{
    protected $table = "config_general";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[
        'fuente',
        'size',
        'logo',
        'fondo_principal',
        'titulo',
        'favicon',
        'mapa',
        'fondo',
        'id_pagina'
    ];

    use HasFactory;
}
