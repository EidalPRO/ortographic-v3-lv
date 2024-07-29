<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logro extends Model
{
    use HasFactory;


    public $timestamps = false;

    protected $fillable = [
        'nombre', // Nombre del logro
        'imagen', // Ruta opcional a la imagen del logro
        'user_id', // ID del usuario que obtuvo el logro
    ];

    // Relación con el usuario que obtuvo el logro
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
