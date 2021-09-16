<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = "galeria";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[
        'id_pagina',
        'imagen',
    ];

    use HasFactory;
}
