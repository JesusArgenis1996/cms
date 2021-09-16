<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    protected $table = "pagina";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[
        'id_user',
        'id_plantilla',
        'dominio',
        'estado',
        
    ];

    use HasFactory;
}
