<?php

use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogrosController;
use App\Http\Controllers\SalasController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['web'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/obtener-salas', [HomeController::class, 'obtenerSalas'])->name('salas.obtener');
    Route::get('/home/mi-perfil', [HomeController::class, 'miPerfil'])->name('miPerfil');
    Route::put('/perfil/actualizar', [HomeController::class, 'actualizar'])->name('perfil.actualizar');


    Route::get('/auth/redirect', [SocialController::class, 'redirect'])->name('auth.redirect');
    Route::get('/auth/facebook/callback', [SocialController::class, 'callback'])->name('auth.callback');
    Route::get('/auth/google/redirect', [SocialController::class, 'redirectGoogle'])->name('authGoogle.redirect');
    Route::get('/auth/google/callback', [SocialController::class, 'callbackGoogle'])->name('authGoogle.callback');

    Route::get('/sala/privada', [SalasController::class, 'privada'])->name('salas.privada');

    Route::get('/salas/privada/redirect/{codigo_sala}', [SalasController::class, 'entrar'])->name('salas.entrar');

    Route::post('/salas/salir/{codigo_sala}', [SalasController::class, 'salir'])->name('salas.salir');

    Route::post('/salas/privada/insert', [SalasController::class, 'agregarUsuarioSala'])->name('salas.agregarUsuarioSala');

    Route::post('/salas/crear', [SalasController::class, 'crear'])->name('salas.crear');

    Route::get('/sala/global', [SalasController::class, 'global'])->name('sala.global');

    Route::get('/sala/global/juego/sala-global', [SalasController::class, 'jugarGlobal'])->name('sala.jugar');

    Route::get('/salas/privada/juego/sala-privada', [SalasController::class, 'juegoPrivada'])->name('salas.privada.juego');

    Route::post('/estadisticas/sala-global', [SalasController::class, 'guardarEstadisticasGlobal'])->name('estadisticas.guardarGlobal');

    Route::post('/estadisticas/sala-privada', [SalasController::class, 'guardarEstadisticasPriv'])->name('estadisticas.guardarPriv');

    Route::get('/sala/global/estadisticas-globales', [EstadisticasController::class, 'estadisticasGlobal'])->name('estadisticas.global');

    Route::get('/sala/global/estadisticas-sala/{sala_id}', [EstadisticasController::class, 'estadisticasPrivada'])->name('estadisticas.privada');

    Route::post('/verificar-logro', [LogrosController::class, 'verificarLogro'])->name('logros.verificar');

    Route::post('/verificar-logro-final', [LogrosController::class, 'verificarLogroFinal'])->name('verificar.logro.final.post');
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/auth/redirect', [SocialController::class, 'redirect'])->name('auth.redirect');

// Route::get('/auth/callback', [SocialController::class, 'callback'])->name('auth.callback');

// Route::get('/sala/global', [SalasController::class, 'global'])->name('sala.global');

// Route::get('/home/obtener-salas', [HomeController::class, 'obtenerSalas'])->name('salas.obtener');
