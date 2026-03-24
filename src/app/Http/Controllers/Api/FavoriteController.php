<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    // findOrFail() attend un ID en paramètre pour chercher une ligne précise. Ici, tu veux récupérer une liste 
    // De plus, on ne peut pas l'enchaîner avant un where.
    // On utilise get() pour récupérer la collection
    public function getFavorites(){
    $favorites = Favorite::with('question.responses')
        ->where('user_id', Auth::id())
        ->get();

    return FavoriteResource::collection($favorites);
}
}
