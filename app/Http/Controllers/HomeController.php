<?php

namespace App\Http\Controllers;

use App\Models\Estadisticas;
use App\Models\Salas;
use App\Models\User;
use App\Models\UsuarioEnSala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::id();

        // Obtener todos los codigo_sala asociados al usuario, excluyendo 'A0123'
        $salaIds = UsuarioEnSala::where('user_id', $userId)
            ->where('sala_id', '!=', 1)
            ->pluck('sala_id');

        // Obtener la información de las salas usando los codigos_sala obtenidos
        $salas = Salas::whereIn('id', $salaIds)->get();

        return view('home', compact('salas'));
    }

    public function obtenerSalas()
    {
        $userId = Auth::id();

        // Obtener todos los sala_id asociados al usuario, excluyendo la sala global con ID 1
        $salaIds = UsuarioEnSala::where('user_id', $userId)
            ->where('sala_id', '!=', 1)
            ->pluck('sala_id');

        // Obtener la información de las salas usando los sala_id obtenidos
        $salas = Salas::whereIn('id', $salaIds)->get();

        return response()->json($salas);
    }

    public function miPerfil()
    {
        $userId = Auth::id();

        // Obtener los detalles del usuario desde la tabla `users`
        $user = User::find($userId);

        // Verificar si el usuario existe
        if (!$user) {
            return back()->withErrors(['error' => 'Usuario no encontrado.']);
        }

        // Determinar la URL de la foto de perfil
        $foto = $user->foto;
        if (strpos($foto, 'https') === 0) {
            $urlfoto = $foto;
        } else {
            $urlfoto = 'assets/img/perfiles/' . $foto;
        }

        // Obtener los logros del usuario
        $logros = $user->logros;

        // Enviar los detalles del usuario a la vista
        return view('perfil', [
            'nombre' => $user->name,
            'email' => $user->email,
            'foto' => $urlfoto,
            'descripcion' => $user->descripcion,
            'creado_el' => $user->created_at,
            'logros' => $logros,
        ]);
        
    }

    public function actualizar(Request $request)
    {
        $userId = Auth::id();

        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:51200',
            'descripcion' => 'required|string|max:100',
        ]);

        $descripcion = $validatedData['descripcion'];

        // Cargar lista de palabras prohibidas
        $palabrasProhibidas = config('palabras_prohibidas.palabras_prohibidas');

        // Verificar si la descripción contiene palabras prohibidas
        if (is_array($palabrasProhibidas)) {
            foreach ($palabrasProhibidas as $palabra) {
                if (is_string($palabra) && stripos($descripcion, $palabra) !== false) {
                    return back()->withErrors(['descripcion' => 'La descripción contiene palabras ofensivas: ' . $palabra]);
                }
            }
        } else {
            return back()->withErrors(['descripcion' => 'Error al cargar las palabras prohibidas.']);
        }

        // Obtener el usuario autenticado
        $user = User::find($userId);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNombre = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('assets/img/perfiles'), $fotoNombre);
            $user->foto = $fotoNombre;
        }

        // Actualizar la descripción
        $user->descripcion = $descripcion;
        $user->save();

        return redirect()->route('miPerfil')->with('success', 'Perfil actualizado correctamente.');
    }
}
