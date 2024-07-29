<?php

namespace App\Http\Controllers;

use App\Models\Estadisticas;
use App\Models\PorcentajeEfectividadGeneral;
use App\Models\Reactivo;
use App\Models\Salas;
use App\Models\User;
use App\Models\UserYSala;
use App\Models\UsuarioEnSala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SalasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    // SALAS GLOBAL 

    public function global(Request $request)
    {
        $userId = Auth::id();
        $salaId = 1; // ID de la sala pasada dinámicamente

        UsuarioEnSala::updateOrCreate(
            ['user_id' => $userId],
            ['sala_id' => $salaId],
        );

        // Crear o actualizar el registro en la tabla usuario_sala_actual
        UserYSala::updateOrCreate(
            ['user_id' => $userId],
            ['sala_id' => $salaId]
        );

        return view('salas.global');
    }

    public function jugarGlobal(Request $request)
    {
        $tema = $request->query('tema');
        $dificultad = $request->query('dificultad');

        // Aquí puedes obtener los datos de la base de datos usando el tema y la dificultad
        $reactivos = Reactivo::where('tipo', $tema)
            ->where('dificultad', $dificultad)
            ->get();

        return view('jugar.glob', [
            'tema' => $tema,
            'dificultad' => $dificultad,
            'reactivos' => $reactivos
        ]);
    }
    public function guardarEstadisticasGlobal(Request $request)
    {
        Log::info('Datos recibidos en guardarEstadisticasGlobal:', $request->all());

        $request->validate([
            'tiempo_usado' => 'required|numeric',
            'porcentaje_efectividad' => 'required|numeric',
            'dificultad' => 'required|string',
            'tema' => 'required|string',
            'reactivos_acertados' => 'required|integer',
            'reactivos_fallados' => 'required|integer',
            'sala_id' => 'required|integer',
        ]);

        $userId = auth()->user()->id;
        $salaId = $request->input('sala_id');

        // Crear o actualizar el registro en la tabla estadisticas
        $estadistica = Estadisticas::updateOrCreate(
            [
                'user_id' => $userId,
                'sala_id' => $salaId,
                'tema' => $request->input('tema'),
                'dificultad' => $request->input('dificultad')
            ],
            [
                'tiempo_usado' => $request->input('tiempo_usado'),
                'porcentaje_efectividad' => $request->input('porcentaje_efectividad'),
                'reactivos_acertados' => $request->input('reactivos_acertados'),
                'reactivos_fallados' => $request->input('reactivos_fallados')
            ]
        );

        Log::info('Estadísticas guardadas', ['estadistica' => $estadistica->toArray()]);

        // Inicializar suma y contador
        $sumaPorcentaje = 0;
        $totalTiempoUsado = 0;

        // Calcular promedio
        $temas = ['acentuacion', 'letras', 'concordancia', 'gramaticaGeneral'];
        $dificultades = ['facil', 'medio', 'dificil'];

        foreach ($temas as $tema) {

            foreach ($dificultades as $dificultad) {
                $estadistica = Estadisticas::where('user_id', $userId)
                    ->where('sala_id', $salaId)
                    ->where('tema', $tema)
                    ->where('dificultad', $dificultad)
                    ->first();

                Log::info('Procesando:', ['tema' => $tema, 'dificultad' => $dificultad, 'estadistica' => $estadistica]);

                if ($estadistica) {
                    $sumaPorcentaje += $estadistica->porcentaje_efectividad;
                    $totalTiempoUsado += $estadistica->tiempo_usado;
                } else {
                    $sumaPorcentaje += 0;
                }
            }
        }

        $porcentajeEfectividadGeneral = $sumaPorcentaje / 12;
        // Crear o actualizar el registro en la tabla porcentaje_efectividad_general
        $porcentajeGeneral = PorcentajeEfectividadGeneral::updateOrCreate(
            [
                'user_id' => $userId,
                'sala_id' => $salaId
            ],
            [
                'porcentaje_efectividad' => $porcentajeEfectividadGeneral,
                'tiempo' => $totalTiempoUsado
            ]
        );

        // Log para verificar
        Log::info('Porcentaje de efectividad general:', $porcentajeGeneral->toArray());


        return response()->json(['success' => true, 'message' => 'Estadísticas guardadas correctamente.']);
    }

    // SALA PRIVADA 
    public function privada(Request $request)
    {
        $datosSala = [
            'sala_id' => $request->input('sala_id'),
            'temas' => json_decode($request->input('temas'), true),
            'codigo_sala' => $request->input('codigo_sala'),
            'dificultades' => json_decode($request->input('dificultades'), true),
            'sala_nombre' => $request->input('sala_nombre')
        ];

        return view('salas.privada', $datosSala);
    }

    public function entrar($salaId)
    {
        $userId = Auth::id();

        UserYSala::updateOrCreate(
            ['user_id' => $userId],
            ['sala_id' => $salaId]
        );

        $datosSala = $this->obtenerDatosSala($salaId);

        // Verificar si 'temas' ya es un array
        if (is_string($datosSala['temas'])) {
            $datosSala['temas'] = json_decode($datosSala['temas'], true);
        }

        $datosSala['temas'] = array_map([$this, 'formatTema'], $datosSala['temas']); // Formatear temas

        return redirect()->route('salas.privada', [
            'sala_id' => $salaId,
            'temas' => json_encode($datosSala['temas']),
            'codigo_sala' => $datosSala['codigo_sala'],
            'dificultades' => json_encode($datosSala['dificultades']),
            'sala_nombre' => $datosSala['sala']->nombre // Asegúrate de pasar el nombre de la sala
        ]);
    }

    public function agregarUsuarioSala(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'sala' => 'required|string',
        ]);

        $codigo_sala = $request->input('sala');

        // Buscar el ID de la sala utilizando el código de sala proporcionado
        $sala = Salas::where('codigo_sala', $codigo_sala)->first();

        if (!$sala) {
            // Mostrar mensaje de error si la sala no existe
            return redirect()->back()->withErrors(['sala' => 'La sala ingresada no existe.']);
        }

        $userId = Auth::id();

        // Verificar si el usuario ya está en la sala
        $usuarioEnSala = UsuarioEnSala::where('user_id', $userId)
            ->where('sala_id', $sala->id)
            ->first();

        if ($usuarioEnSala) {
            $datosSala = $this->obtenerDatosSala($sala->id);

            // Verificar si 'temas' ya es un array
            if (is_string($datosSala['temas'])) {
                $datosSala['temas'] = json_decode($datosSala['temas'], true);
            }

            $datosSala['temas'] = array_map([$this, 'formatTema'], $datosSala['temas']); // Formatear temas

            return redirect()->route('salas.privada', [
                'sala_id' => $sala->id,
                'temas' => json_encode($datosSala['temas']),
                'codigo_sala' => $sala->codigo_sala,
                'dificultades' => json_encode($datosSala['dificultades']),
                'sala_nombre' => $sala->nombre // Asegúrate de pasar el nombre de la sala
            ]);
        }

        // Crear una nueva entrada en la tabla usuario_en_salas
        UsuarioEnSala::create([
            'user_id' => $userId,
            'sala_id' => $sala->id,
        ]);

        UserYSala::updateOrCreate(
            ['user_id' => $userId],
            ['sala_id' => $sala->id]
        );

        $datosSala = $this->obtenerDatosSala($sala->id);

        // Verificar si 'temas' ya es un array
        if (is_string($datosSala['temas'])) {
            $datosSala['temas'] = json_decode($datosSala['temas'], true);
        }

        $datosSala['temas'] = array_map([$this, 'formatTema'], $datosSala['temas']); // Formatear temas

        return redirect()->route('salas.privada', [
            'sala_id' => $sala->id,
            'temas' => json_encode($datosSala['temas']),
            'codigo_sala' => $sala->codigo_sala,
            'dificultades' => json_encode($datosSala['dificultades']),
            'sala_nombre' => $sala->nombre // Asegúrate de pasar el nombre de la sala
        ]);
    }

    public function crear(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre_sala' => 'required|string|max:255',
            'dificultades' => 'nullable|array',
            'temas' => 'nullable|array',
        ]);

        // Verificar si el código de sala ya existe en la base de datos
        $codigo_sala = $request->codigo;
        $existe_codigo = Salas::where('codigo_sala', $codigo_sala)->exists();

        if ($existe_codigo) {
            // Mostrar un mensaje de error con SweetAlert
            return back()->withErrors(['error' => 'El código de sala ya está en uso. Por favor, elige otro código.']);
        }

        // Definir valores por defecto para temas y dificultades
        $temasPorDefecto = ['acentuacion', 'letras', 'concordancia', 'gramaticaGeneral'];
        $dificultadesPorDefecto = ['facil', 'medio', 'dificil'];

        // Obtener las selecciones del usuario y combinarlas con los valores por defecto si están vacías
        $temasSeleccionados = $request->temas ?? [];
        $dificultadesSeleccionadas = $request->dificultades ?? [];

        // Si no se seleccionó ningún tema, usar todos los temas por defecto
        if (empty($temasSeleccionados)) {
            $temasSeleccionados = $temasPorDefecto;
        }

        // Si no se seleccionó ninguna dificultad, usar todas las dificultades por defecto
        if (empty($dificultadesSeleccionadas)) {
            $dificultadesSeleccionadas = $dificultadesPorDefecto;
        }

        // Crear una nueva instancia de Sala
        $sala = new Salas();
        $sala->codigo_sala = $codigo_sala;
        $sala->nombre = $request->nombre_sala;
        $sala->descripcion = 'Hola Mundo';
        $sala->dificultades = json_encode($dificultadesSeleccionadas); // Convertir a JSON las dificultades seleccionadas
        $sala->temas = json_encode($temasSeleccionados); // Convertir a JSON los temas seleccionados
        $sala->id_administrador = auth()->id(); // Asignar el ID de usuario autenticado como administrador

        // Guardar la sala en la base de datos
        $sala->save();

        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Crear una nueva entrada en la tabla usuario_en_salas
        UsuarioEnSala::create([
            'user_id' => $userId,
            'sala_id' => $sala->id,
        ]);

        // Actualizar o crear una entrada en la tabla UserYSala
        UserYSala::updateOrCreate(
            ['user_id' => $userId],
            ['sala_id' => $sala->id]
        );

        $datosSala = $this->obtenerDatosSala($sala->id);

        // Verificar si 'temas' ya es un array
        if (is_string($datosSala['temas'])) {
            $datosSala['temas'] = json_decode($datosSala['temas'], true);
        }

        $datosSala['temas'] = array_map([$this, 'formatTema'], $datosSala['temas']); // Formatear temas

        return redirect()->route('salas.privada', [
            'sala_id' => $sala->id,
            'temas' => json_encode($datosSala['temas']),
            'codigo_sala' => $sala->codigo_sala,
            'dificultades' => json_encode($datosSala['dificultades']),
            'sala_nombre' => $sala->nombre // Asegúrate de pasar el nombre de la sala
        ]);
    }


    public function salir(Request $request, $codigo_sala)
    {
        $userId = Auth::id();

        // El usuario saldra de la sala
        UsuarioEnSala::where('user_id', $userId)
            ->where('sala_id', $codigo_sala)
            ->delete();

        // Eliminar todos los datos del usuario con ese ID de sala de la tabla estadisticas
        Estadisticas::where('user_id', $userId)
            ->where('sala_id', $codigo_sala)
            ->delete();

        return redirect()->route('home');
    }
    private function formatTema($tema)
    {
        // Manejo de casos especiales
        $specialCases = [
            'gramaticaGeneral' => 'Gramática General',
            'acentuacion' => 'Acentuación',
            'letras' => 'Uso de Letras'
        ];

        if (isset($specialCases[$tema])) {
            return $specialCases[$tema];
        }

        // Separar palabras y capitalizar la primera letra de cada palabra
        $formatted = ucwords(str_replace('_', ' ', $tema));

        return $formatted;
    }

    public function juegoPrivada(Request $request)
    {
        $tema = $request->query('tema');
        $dificultad = $request->query('dificultad');
        $codigoSala = $request->query('codigo_sala'); // Obtener el código de la sala

        // Obtener la sala desde la base de datos usando el código de sala
        $sala = Salas::where('codigo_sala', $codigoSala)->first();

        if (!$sala) {
            return redirect()->back()->withErrors(['sala' => 'La sala no existe.']);
        }

        $salaId = $sala->id;

        // Obtener los datos de la base de datos usando el tema y la dificultad
        $reactivos = Reactivo::where('tipo', $tema)
            ->where('dificultad', $dificultad)
            ->get();

        return view('jugar.priv', [
            'tema' => $tema,
            'dificultad' => $dificultad,
            'sala_id' => $salaId,
            'reactivos' => $reactivos
        ]);
    }

    public function guardarEstadisticasPriv(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'tiempo_usado' => 'required|numeric',
            'porcentaje_efectividad' => 'required|numeric',
            'dificultad' => 'required|string',
            'tema' => 'required|string',
            'reactivos_acertados' => 'required|integer',
            'reactivos_fallados' => 'required|integer',
            'sala_id' => 'required|integer',
        ]);

        // Puedes verificar los datos recibidos en el log para depuración
        Log::info('Datos recibidos:', $validatedData);

        $userId = auth()->user()->id;
        $salaId = $request->input('sala_id');


        $userId = auth()->user()->id;
        $salaId = $request->input('sala_id');

        // Crear o actualizar el registro en la tabla estadisticas
        $estadistica = Estadisticas::updateOrCreate(
            [
                'user_id' => $userId,
                'sala_id' => $salaId,
                'tema' => $request->input('tema'),
                'dificultad' => $request->input('dificultad')
            ],
            [
                'tiempo_usado' => $request->input('tiempo_usado'),
                'porcentaje_efectividad' => $request->input('porcentaje_efectividad'),
                'reactivos_acertados' => $request->input('reactivos_acertados'),
                'reactivos_fallados' => $request->input('reactivos_fallados')
            ]
        );

        Log::info('Estadísticas guardadas', ['estadistica' => $estadistica->toArray()]);

        // Inicializar suma y contador
        $sumaPorcentaje = 0;
        $totalTiempoUsado = 0;
        $vueltas = 0;

        // Obtener los temas y dificultades de la sala
        $sala = Salas::find($salaId);

        if (!$sala) {
            return response()->json(['success' => false, 'message' => 'Sala no encontrada.']);
        }

        // Suponiendo que `dificultades` y `temas` están almacenados como arrays en la tabla `salas`
        $dificultades = json_decode($sala->dificultades, true);
        $temas = json_decode($sala->temas, true);

        // Si el array de dificultades está vacío, asignar las dificultades predeterminadas
        if (empty($dificultades)) {
            $dificultades = ['facil', 'medio', 'dificil'];
        }

        // Si el array de temas está vacío, asignar los temas predeterminados
        if (empty($temas)) {
            $temas = ['acentuacion', 'letras', 'concordancia', 'gramaticaGeneral'];
        }

        foreach ($temas as $tema) {

            foreach ($dificultades as $dificultad) {
                $estadistica = Estadisticas::where('user_id', $userId)
                    ->where('sala_id', $salaId)
                    ->where('tema', $tema)
                    ->where('dificultad', $dificultad)
                    ->first();

                Log::info('Procesando:', ['tema' => $tema, 'dificultad' => $dificultad, 'estadistica' => $estadistica]);

                if ($estadistica) {
                    $vueltas++;
                    $sumaPorcentaje += $estadistica->porcentaje_efectividad;
                    $totalTiempoUsado += $estadistica->tiempo_usado;
                } else {
                    $vueltas++;
                    $sumaPorcentaje += 0;
                }
            }
        }

        $porcentajeEfectividadGeneral = $sumaPorcentaje / $vueltas;
        // Crear o actualizar el registro en la tabla porcentaje_efectividad_general
        $porcentajeGeneral = PorcentajeEfectividadGeneral::updateOrCreate(
            [
                'user_id' => $userId,
                'sala_id' => $salaId
            ],
            [
                'porcentaje_efectividad' => $porcentajeEfectividadGeneral,
                'tiempo' => $totalTiempoUsado
            ]
        );

        // Log para verificar
        Log::info('Porcentaje de efectividad general:', $porcentajeGeneral->toArray());


        return response()->json(['success' => true, 'message' => 'Estadísticas guardadas correctamente.']);
    }

    public function obtenerDatosSala($salaId)
    {
        $sala = Salas::findOrFail($salaId);

        // Decodificar las dificultades y los temas
        $dificultades = json_decode($sala->dificultades, true);
        $temas = json_decode($sala->temas, true);

        // Si las dificultades o temas están vacíos, asignar todas las opciones posibles
        if (empty($dificultades)) {
            $dificultades = ['facil', 'medio', 'dificil'];
        }

        if (empty($temas)) {
            $temas = ['Acentuacion', 'Uso de letras', 'Concordancia', 'Gramatica General'];
        }

        // Obtener el administrador de la sala
        $administrador = User::findOrFail($sala->id_administrador);
        $codigo_sala = $sala->codigo_sala;
        $nombre = $sala->nombre;

        return [
            'sala' => $sala,
            'dificultades' => $dificultades,
            'temas' => $temas,
            'administrador' => $administrador,
            'codigo_sala' => $codigo_sala,
            'sala_nombre' => $nombre // Asegúrate de incluir el nombre de la sala
        ];
    }
}
