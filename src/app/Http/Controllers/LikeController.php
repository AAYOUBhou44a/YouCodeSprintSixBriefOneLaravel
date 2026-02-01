<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\Question;

class LikeController extends Controller
{
    public function like($id){
        // Fail si la question n'existe pas (évite les erreurs 500)
        $question = Question::findOrFail($id);
        
        // first() : "Ok, lance la recherche et donne-moi le premier résultat que tu trouves." 
        $like = Like::where('user_id', Auth::id())->where('question_id', $id)->first();
        $like ? $like->delete() : Like::create([
            'question_id' => $id,
            'user_id' => Auth::id()
        ]);
        // $like = Like::firstOrCreate([
        //     'question_id' => $id,
        //     'user_id' => Auth::id()
        // ]);

        return back();
    }
}
