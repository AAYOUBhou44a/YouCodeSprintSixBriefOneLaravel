<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function addFavorite($id){
        // Cherche si l'utilisateur a déjà mis CETTE question en favori
        // Sinon, il crée la ligne.
        $favorite = Favorite::firstOrCreate([
            'question_id' => $id,
            'user_id' => Auth::id()
        ]);

        if($favorite){
            return redirect()->route('favorites');
        }
        return back();
    }

    public function getFavorites(){
        $favorites = Favorite::with('question.responses')->where('user_id', Auth::id())->get();
        // findOrFail() attend un ID en paramètre pour chercher une ligne précise. Ici, tu veux récupérer une liste 
        // De plus, on ne peut pas l'enchaîner avant un where.
        // On utilise get() pour récupérer la collection
        return view('favorites.index', compact('favorites'));
    }
}
