<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('API_BASE_URL') . '/api';
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $response = Http::post($this->apiUrl . '/login', [
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            session(['token' => $response->json()['token']]);
            session(['user'  => $response->json()['user']]);
            return redirect()->route('teachers.index');
        }

        return back()->withErrors(['email' => 'Credencials incorrectes.']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $response = Http::post($this->apiUrl . '/register', [
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            session(['token' => $response->json()['token']]);
            session(['user'  => $response->json()['user']]);
            return redirect()->route('teachers.index');
        }

        return back()->withErrors(['email' => 'Error en el registre.']);
    }

    public function logout(Request $request)
    {
        Http::withToken(session('token'))->post($this->apiUrl . '/logout');
        $request->session()->forget(['token', 'user']);
        return redirect()->route('login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $response = Http::post($this->apiUrl . '/register', [
            'name'     => $googleUser->getName(),
            'email'    => $googleUser->getEmail(),
            'password' => bcrypt($googleUser->getId()),
        ]);

        if (!$response->successful()) {
            $response = Http::post($this->apiUrl . '/login-google', [
                'email' => $googleUser->getEmail(),
            ]);
        }

        if ($response->successful()) {
            session(['token' => $response->json()['token']]);
            session(['user'  => $response->json()['user']]);
            return redirect()->route('teachers.index');
        }

        return redirect()->route('login')->withErrors(['email' => 'Error amb Google.']);
    }
}