<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Http\Requests\LoginRequest;
class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    
    public function submitRegister(RegisterRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'city' => $request->city,
            'street' => $request->street
        ]);
        
        Auth::login($user);
        return redirect('/questions');
        // return redirect()->route('auth.login')->with('success', 'Bienvenue dans le voisinage');
        // return redirect('/login');
    }
    
    public function login(){
        return view('auth.login');
    }

    public function submitLogin(LoginRequest $request){
        // $request est un objet énorme. Il contient les cookies, l'adresse IP, les fichiers envoyés 
        $credentials = $request->only('email', 'password');
        // $request->only(...) crée un petit tableau propre qui ne contient que les données dont Laravel a besoin pour identifier l'utilisateur. 
        if(Auth::attempt($credentials)){
            // Auth::check() ne prend pas d'argument et sert juste à savoir si quelqu'un est déjà connecté 
            $request->session()->regenerate();
            // $request->session() Dans Laravel, la session appartient à la requête en cours. Auth sert uniquement à gérer l'utilisateur (savoir qui il est). 

            if(Auth::user()->role === 'admin'){
                return redirect()->route('dashboard');
            }
            return redirect('/questions');
        }
        return back();
    }

    public function logout(Request $request){
        Auth::logout();
        // Détruire la session côté serveur , invalidate(): Efface toutes les données de la session actuelle pour que personne ne puisse la voler.
        $request->session()->invalidate();
        // Régénérer le jeton CSRF pour plus de sécurité , Change le jeton CSRF pour que le formulaire de login suivant soit propre.
        $request->session()->regenerateToken();
        
        return redirect('/register');
    }
}
