<?php

namespace App\Http\Controllers;

use App\Models\Estadisticas;
use App\Models\Logro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogrosController extends Controller
{
    public function verificarLogro(Request $request)
    {
        $userId = auth()->user()->id;
        $tema = $request->input('tema');

        Log::info('Usuario ID: ' . $userId);
        Log::info('Tema: ' . $tema);

        // Verificar si el usuario ya tiene el logro para este tema
        $logroExistente = Logro::where('user_id', $userId)
            ->where('nombre', 'LIKE', "%$tema%")
            ->exists();

        if ($logroExistente) {
            Log::info('El usuario ya ha obtenido este logro anteriormente.');
            return response()->json(['success' => false, 'message' => 'El usuario ya ha obtenido este logro anteriormente.']);
        }

        // Obtener las estadísticas del usuario para el tema especificado
        $estadisticas = Estadisticas::where('user_id', $userId)
            ->where('tema', $tema)
            ->where('sala_id', 1) // Añadimos esta condición
            ->get();

        Log::info('Estadísticas encontradas: ' . $estadisticas->count());

        $sumatoria = 0;

        foreach ($estadisticas as $estadistica) {
            Log::info('Estadística efectividad: ' . $estadistica->porcentaje_efectividad);
            $sumatoria += $estadistica->porcentaje_efectividad;
        }

        Log::info('Sumatoria de efectividad: ' . $sumatoria);

        // Verificar si se cumple la condición para el logro (300 en las tres dificultades)
        if ($sumatoria == 300) {
            // Guardar el logro para el usuario
            // Determinar el nombre del logro según el tema y subtema
            switch ($tema) {
                case 'acentuacion':
                    $tm = 1;
                    $nombreLogro = "Maestro de la Acentuación";
                    $descripcion = "Por obtener el 100% de efectividad en el tema de Acentuación.";
                    $imagenLogro = 'assets/img/logros/Acentuacion.webp';
                    break;
                case 'letras':
                    $tm = 2;
                    $nombreLogro = "Rey de las Letras";
                    $descripcion = "Por obtener el 100% de efectividad en el tema de Uso de Letras.";
                    $imagenLogro = 'assets/img/logros/Logro-letras.webp';
                    break;
                case 'concordancia':
                    $tm = 3;
                    $nombreLogro = "Señor de la Concordancia";
                    $descripcion = "Por obtener el 100% de efectividad en el tema de Concordancia.";
                    $imagenLogro = 'assets/img/logros/Concordancia.webp';
                    break;
                case 'gramaticaGeneral':
                    $tm = 4;
                    $nombreLogro = "Experto en Gramática";
                    $descripcion = "Por obtener el 100% de efectividad en el tema de Gramática General.";
                    $imagenLogro = 'assets/img/logros/Gramatica.webp';
                    break;
            }

            $logro = new Logro();
            $logro->nombre = $nombreLogro; // Nombre del logro
            $logro->imagen = $imagenLogro; // Opcional: ruta a una imagen del logro
            $logro->descripcion = $descripcion;
            $logro->user_id = $userId;
            $logro->save();

            Log::info('¡Logro desbloqueado!: ' . $nombreLogro);

            return response()->json([
                'success' => true,
                'message' => '¡Logro desbloqueado!',
                'logro_nombre' => $nombreLogro,
                'logro_imagen' => $imagenLogro,
                'tema_logro' => $tm,
            ]);
        }

        Log::info('No se ha desbloqueado ningún logro.');

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
                'Maestro de la Acentuación',
                'Rey de las Letras',
                'Señor de la Concordancia',
                'Experto en Gramática'
            ])
            ->count();

        // Si tiene los cuatro logros individuales, otorgar el logro final
        if ($logrosIndividuales == 4) {
            $logroFinal = new Logro();
            $logroFinal->user_id = $userId;
            $logroFinal->nombre = 'Sabio Ortográfico'; // Nombre del logro final
            $logroFinal->imagen = 'assets/img/logros/logro-final.webp'; // Nombre de la imagen del logro final
            $logroFinal->descripcion = "Por obtener el 100% de efectividad en todos los temas.";
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
