<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use App\Models\Response;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // public function submitQuestion(QuestionRequest $request){
    //     $question = Question::create([
    //         'title' => $request->title,
    //         'content' => $request->content,
    //         'city' => $request->city,
    //         'street' => $request->street,
    //         'user_id' => Auth::id()
    //     ]);
        
    //     if($question){
    //         return redirect()->route('questions');
    //     }
    //     // return redirect()->route('questions');
    // }

    public function getQuestions(){
        $questions = Question::with(['user', 'responses', 'likes', 'favorites'])->latest()->get();
        $totalResponses = Response::count();
        return response()->json([
            'data' => QuestionResource::collection($questions),
            'total_responses' => $totalResponses
        ]);
        // Le mot 'user' dans with('user') fait directement référence au nom de la fonction (la relation) que tu as écrite dans ton modèle Question.php. 
    }

    public function showQuestion($id){
        $question = Question::with(['user', 'responses.user'])->findOrFail($id);
        return new QuestionResource($question);
    }
    
    // public function delete($id){
    //     $question = Question::where('user_id', Auth::id())->where('id', $id);
    //     if($question){
    //         $question->delete();
    //         return back();
    //     }
    //     return back();
    // }
    
    // public function edit($id){
    //     $question = Question::findOrFail($id);
    //     return view('questions.create', compact('question'));
    // }

    // public function submitUpdates(QuestionRequest $request, $id){
    //     $question = Question::findOrFail($id);
    //     if(!$question){
    //         return back();
    //     }
    //     $updated = $question->update([
    //         'title' => $request->title,
    //         'content' => $request->content,
    //         'city' => $request->city,
    //         'street' => $request->street,
    //         'user_id' => Auth::id()
    //     ]);

    //     return $updated ? redirect()->route('questions') : back();
    // }
}
