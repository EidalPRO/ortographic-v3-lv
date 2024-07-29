<?php

namespace App\Http\Controllers;

use App\Models\Estadisticas;
use App\Models\Logro;
use Illuminate\Http\Request;

class LogrosController extends Controller
{
    public function verificarLogro(Request $request)
    {
        $userId = auth()->user()->id;
        $tema = $request->input('tema');

        // Verificar si el usuario ya tiene el logro para este tema
        $logroExistente = Logro::where('user_id', $userId)
            ->where('nombre', 'LIKE', "%$tema%")
            ->exists();

        if ($logroExistente) {
            return response()->json(['success' => false, 'message' => 'El usuario ya ha obtenido este logro anteriormente.']);
        }

        // Obtener las estadísticas del usuario para el tema especificado
        $estadisticas = Estadisticas::where('user_id', $userId)
            ->where('tema', $tema)
            ->get();

        $sumatoria = 0;

        foreach ($estadisticas as $estadistica) {
            $sumatoria += $estadistica->porcentaje_efectividad;
        }

        // Verificar si se cumple la condición para el logro (300 en las tres dificultades)
        if ($sumatoria == 300) {
            // Guardar el logro para el usuario
            // Determinar el nombre del logro según el tema y subtema
            switch ($tema) {
                case 'acentuacion':
                    $tm = 1;
                    $nombreLogro = "Maestro de la Acentuación";
                    $imagenLogro = 'assets/img/logros/Acentuacion.webp';
                    break;
                case 'letras':
                    $tm = 2;
                    $nombreLogro = "Rey de las Letras";
                    $imagenLogro = 'assets/img/logros/Logro-letras.webp';
                    break;
                case 'concordancia':
                    $tm = 3;
                    $nombreLogro = "Señor de la Concordancia";
                    $imagenLogro = 'assets/img/logros/Concordancia.webp';
                    break;
                case 'gramaticaGeneral':
                    $tm = 4;
                    $nombreLogro = "Experto en Gramática";
                    $imagenLogro = 'assets/img/logros/Gramatica.webp';
                    break;
            }

            $logro = new Logro();
            $logro->nombre = $tema; // Nombre del logro
            $logro->imagen = $imagenLogro; // Opcional: ruta a una imagen del logro
            $logro->user_id = $userId;
            $logro->save();

            return response()->json([
                'success' => true,
                'message' => '¡Logro desbloqueado!',
                'logro_nombre' => $nombreLogro,
                'logro_imagen' => $imagenLogro,
                'tema_logro' => $tm,
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No se ha desbloqueado ningún logro.']);
    }

    public function verificarLogroFinal()
    {

        $userId = auth()->user()->id;
        // Verificar si el usuario ya tiene el logro final
        $tieneLogroFinal = Logro::where('user_id', $userId)
            ->where('nombre', 'Sabio Ortográfico') // El nombre del logro final
            ->exists();

        if ($tieneLogroFinal) {
            // Ya tiene el logro final, no hagas nada
            return response()->json(['logro' => false]);
        }

        // Consultar los logros individuales del usuario
        $logrosIndividuales = Logro::where('user_id', $userId)
            ->whereIn('nombre', [
                'acentuacion',
                'letras',
                'concordancia',
                'gramaticaGeneral'
            ])
            ->count();

        // Si tiene los cuatro logros individuales, otorgar el logro final
        if ($logrosIndividuales == 4) {
            $logroFinal = new Logro();
            $logroFinal->user_id = $userId;
            $logroFinal->nombre = 'Sabio Ortográfico'; // Nombre del logro final
            $logroFinal->imagen = 'assets/img/logros/logro-final.webp'; // Nombre de la imagen del logro final
            $logroFinal->save();

            // Aquí puedes devolver el nombre y la imagen del logro final si es necesario
            return  response()->json([
                'logro' => true,
                'nombre' => $logroFinal->nombre,
                'imagen' => $logroFinal->imagen
            ]);
        }

        // No se otorga el logro final en este caso
        return response()->json(['logro' => false]);
    }
}
