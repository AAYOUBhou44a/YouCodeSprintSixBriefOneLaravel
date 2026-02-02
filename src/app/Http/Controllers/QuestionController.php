<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\QuestionRequest;
use App\Models\Response;

class QuestionController extends Controller
{
    public function submitQuestion(QuestionRequest $request){
        $question = Question::create([
            'title' => $request->title,
            'content' => $request->content,
            'city' => $request->city,
            'street' => $request->street,
            'user_id' => Auth::id()
        ]);
        
        if($question){
            return redirect()->route('questions');
        }
        // return redirect()->route('questions');
    }

    public function getQuestions(){
        $questions = Question::with(['user', 'responses', 'likes', 'favorites'])->latest()->get();
        $totalResponses = Response::count();
        return view('questions.index', compact('questions', 'totalResponses'));
        // Correction : compact('questions') et non compact($questions)
        // Le mot 'user' dans with('user') fait directement référence au nom de la fonction (la relation) que tu as écrite dans ton modèle Question.php. 
    }

    public function showQuestion($id){
        $question = Question::with(['user', 'responses.user'])->findOrFail($id);
        return view('questions.show', compact('question'));
    }
    
    public function delete($id){
        $question = Question::where('user_id', Auth::id())->where('id', $id);
        if($question){
            $question->delete();
            return back();
        }
        return back();
    }
    
    public function edit($id){
        $question = Question::findOrFail($id);
        return view('questions.create', compact('question'));
    }

    public function submitUpdates(QuestionRequest $request, $id){
        $question = Question::findOrFail($id);
        if(!$question){
            return back();
        }
        $updated = $question->update([
            'title' => $request->title,
            'content' => $request->content,
            'city' => $request->city,
            'street' => $request->street,
            'user_id' => Auth::id()
        ]);

        return $updated ? redirect()->route('questions') : back();
    }
}
