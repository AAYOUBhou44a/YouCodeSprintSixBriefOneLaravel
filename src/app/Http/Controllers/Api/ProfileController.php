<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
{
    // 1. On récupère l'utilisateur connecté
    $user = Auth::user();

    // 2. Si personne n'est connecté, on renvoie une erreur 401 au lieu de faire planter le script
    if (!$user) {
        return response()->json(['message' => 'Non authentifié'], 401);
    }

    // 3. On charge les relations nécessaires
    $user->load(['questions', 'likes']);

    // 4. On retourne la ressource (utilise 'new' et non 'collection' pour un seul profil)
    return response()->json([
        'user' => new ProfileResource($user)
    ]);
}
}