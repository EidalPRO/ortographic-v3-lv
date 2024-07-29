<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reactivo extends Model
{
    use HasFactory;

    protected $table = 'reactivos';

    // Si tienes columnas con nombres diferentes a los predeterminados (created_at, updated_at)
    public $timestamps = false;

    protected $fillable = [
        'tipo',
        'dificultad',
        'pregunta',
        'respuesta',
        'distractor_1',
        'distractor_2',
        'feedback',
        'oracionCorrecta'
    ];
}
