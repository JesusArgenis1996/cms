<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enlace extends Model
{
    protected $table = "enlace";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[
        'id_pagina',
        'imagen',
        'enlace',
    ];

    use HasFactory;
}
