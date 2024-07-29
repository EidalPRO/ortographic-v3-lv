<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserYSala extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'usuario_sala_actual';

    protected $fillable = [
        'user_id',
        'sala_id',
    ];
}
