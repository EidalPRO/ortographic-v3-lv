<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PorcentajeEfectividadGeneral extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'porcentaje_efectividad_general';

    protected $fillable = [
        'user_id',
        'sala_id',
        'porcentaje_efectividad',
        'tiempo',
    ];

    // Relaciones si las necesitas
}
