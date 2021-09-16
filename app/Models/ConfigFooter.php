<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigFooter extends Model
{
    protected $table = "config_footer";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[
        'color',
        'background',
        'cr',
        'direccion',
        'telefono',
        'correo',
        'horarios',
        'id_pagina'
    ];

    use HasFactory;
}
