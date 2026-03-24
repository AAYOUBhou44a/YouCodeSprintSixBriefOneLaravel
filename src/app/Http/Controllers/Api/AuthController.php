<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function submitRegister(RegisterRequest $request) 
{
    // 1. Création
    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'city'     => $request->city,
        'street'   => $request->street,
    ]);

    // 2. Connexion automatique
    Auth::login($user);
    $request->session()->regenerate();

    // 3. Réponse JSON
    return response()->json(['user' => $user], 201);
}
    /**
     * Gère la tentative de connexion.
     */
    public function login(Request $request)
    {
        // 1. Validation des données entrantes
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Tentative d'authentification
        // Auth::attempt vérifie l'email et le mot de passe (haché) automatiquement
        if (Auth::attempt($credentials)) {
            
            // 3. Régénération de la session (Protection contre la fixation de session)
            $request->session()->regenerate();

            return response()->json([
                'message' => 'Connexion réussie',
                'user' => Auth::user(), // Retourne l'utilisateur connecté
            ], 200);
        }

        // 4. Si les identifiants sont faux
        return response()->json([
            'message' => 'L\'adresse email ou le mot de passe est incorrect.',
        ], 401);
    }

    /**
     * Gère la déconnexion.
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Déconnexion réussie']);
    }
}