<?php

namespace App\Http\Controllers;

use App\Models\Estadisticas;
use App\Models\PorcentajeEfectividadGeneral;
use App\Models\Salas;
use App\Models\User;
use App\Models\UsuarioEnSala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstadisticasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function estadisticasGlobal()
    {
        $userId = Auth::id();
        $estadisticas = Estadisticas::where('sala_id', 1)->get();
        $porcentajeEfectividadGeneral = PorcentajeEfectividadGeneral::where('sala_id', 1)->get();
        // Contar el número de usuarios en la sala
        $numUsuariosEnSala = UsuarioEnSala::where('sala_id', 1)->distinct('user_id')->count();

        // Organizar las estadísticas por usuario, tema y dificultad
        $estadisticasDetalladas = [];
        foreach ($estadisticas as $estadistica) {
            $usuario = User::find($estadistica->user_id)->name ?? 'Usuario no encontrado';
            $tema = $estadistica->tema;
            $dificultad = $estadistica->dificultad;

            if (!isset($estadisticasDetalladas[$usuario])) {
                $estadisticasDetalladas[$usuario] = [];
            }
            if (!isset($estadisticasDetalladas[$usuario][$tema])) {
                $estadisticasDetalladas[$usuario][$tema] = [
                    'facil' => 0,
                    'medio' => 0,
                    'dificil' => 0,
                ];
            }
            $estadisticasDetalladas[$usuario][$tema][$dificultad] = $estadistica->porcentaje_efectividad;
        }

        return view('estadisticas.global', compact('estadisticas', 'porcentajeEfectividadGeneral', 'estadisticasDetalladas', 'numUsuariosEnSala'));
    }

    public function estadisticasPrivada($sala_id)
    {
        $userId = Auth::id();

        $estadisticas = Estadisticas::where('sala_id', $sala_id)->get();
        $porcentajeEfectividadGeneral = PorcentajeEfectividadGeneral::where('sala_id', $sala_id)->get();

        $numUsuariosEnSala = UsuarioEnSala::where('sala_id', $sala_id)->distinct('user_id')->count();

        // Organizar las estadísticas por usuario, tema y dificultad
        $estadisticasDetalladas = [];
        foreach ($estadisticas as $estadistica) {
            $usuario = User::find($estadistica->user_id)->name ?? 'Usuario no encontrado';
            $tema = $estadistica->tema;
            $dificultad = $estadistica->dificultad;

            if (!isset($estadisticasDetalladas[$usuario])) {
                $estadisticasDetalladas[$usuario] = [];
            }
            if (!isset($estadisticasDetalladas[$usuario][$tema])) {
                $estadisticasDetalladas[$usuario][$tema] = [
                    'facil' => 0,
                    'medio' => 0,
                    'dificil' => 0,
                ];
            }
            $estadisticasDetalladas[$usuario][$tema][$dificultad] = $estadistica->porcentaje_efectividad;
        }

        // Obtener los temas y dificultades de la sala
        $sala = Salas::find($sala_id);

        if (!$sala) {
            return response()->json(['success' => false, 'message' => 'Sala no encontrada.']);
        }

        $nombre_sala = $sala->nombre;
        $codigo_sala = $sala->codigo_sala;


        return view('estadisticas.privada', compact('sala_id', 'nombre_sala', 'codigo_sala', 'estadisticas', 'porcentajeEfectividadGeneral', 'estadisticasDetalladas', 'numUsuariosEnSala'));
    }
}
