<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigMenu extends Model
{
    protected $table = "config_menu";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[
        'titulo',
        'color',
        'background',
        'id_pagina',
    ];

    use HasFactory;
}
