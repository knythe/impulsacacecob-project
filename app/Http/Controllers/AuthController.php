<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $validCredentials = [
        'admin.impulsa.cacecob' => [
            'password' => 'impulsacacecob2024@',
            'redirect' => 'admin.dashboard'
        ],
        'luiscastillo.cacecob' => [
            'password' => 'cacecob2024@',
            'redirect' => 'luis.dashboard'
        ],
        'janeth.impulsa' => [
            'password' => 'impulsa2024@',
            'redirect' => 'janeth.dashboard'
        ],
    ];

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($this->validateCredentials($credentials['email'], $credentials['password'])) {
            // Redirige al dashboard específico basado en el usuario
            return redirect()->route($this->validCredentials[$credentials['email']]['redirect']);
        }

        // Si la autenticación falla
        return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    private function validateCredentials($email, $password)
    {
        return isset($this->validCredentials[$email]) && $this->validCredentials[$email]['password'] === $password;
    }
}
