<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigItem extends Model
{
    protected $table = "config_item";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[
        'titulo',
        'enlace',
        'icono',
        'id_menu',
    ];

    use HasFactory;
}
