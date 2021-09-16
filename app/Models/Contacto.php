<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contacto';
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[
        'nombres',
        'correo',
        'telefono',
        'mensaje',
        'id_pagina'
    ];

    protected $guarded = [

    ];
}
