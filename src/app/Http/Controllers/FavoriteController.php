<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Question;

class FavoriteController extends Controller
{
    public function addFavorite($id){
        // Cherche si l'utilisateur a déjà mis CETTE question en favori
        // Sinon, il crée la ligne.

        $question = Question::findOrFail($id);

        $favorite = Favorite::where('user_id', Auth::id())->where('question_id', $id)->first();

        $favorite ? $favorite->delete() : Favorite::create([
            'user_id' => Auth::id(),
            'question_id' => $id
        ]);
        
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
