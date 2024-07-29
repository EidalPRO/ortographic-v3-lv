<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadisticas extends Model
{
    use HasFactory;


    protected $table = 'estadisticas';

    // Si tienes columnas con nombres diferentes a los predeterminados (created_at, updated_at)
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'sala_id', 'tema', 'dificultad', 'tiempo_usado', 'porcentaje_efectividad', 'reactivos_acertados', 'reactivos_fallados'
    ];
}
