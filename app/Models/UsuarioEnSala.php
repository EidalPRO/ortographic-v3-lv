<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioEnSala extends Model
{
    use HasFactory;


    protected $table = 'usuario_en_salas';

    protected $fillable = [
        'user_id',
        'sala_id',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Sala
    public function sala()
    {
        return $this->belongsTo(Salas::class);
    }
}
