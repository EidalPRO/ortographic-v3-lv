<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {

        try {
            $user = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'No se pudo autenticar con Facebook, intentelo nuevamente.');
        }


        $user = User::firstOrCreate([
            'email' => $user->getEmail(),
        ], [
            'name' => $user->getName(),
            'foto' => $user->getAvatar(),
            'descripcion' => '¿Qué miras?',
        ]);

        auth()->login($user);

        return redirect()->to('/home');
    }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            // dd($user);
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'No se pudo autenticar con Google, intentelo nuevamente.');
        }

        $user = User::firstOrCreate([
            'email' => $user->getEmail(),
        ], [
            'name' => $user->getName(),
            'foto' => $user->getAvatar(),
            'descripcion' => '¿Qué miras?',
        ]);

        auth()->login($user);

        return redirect()->to('/home');
    }
}
