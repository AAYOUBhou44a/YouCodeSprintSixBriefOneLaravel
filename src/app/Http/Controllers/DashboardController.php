<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $questions = Question::with('user')->latest()->get();
        $totalResponses = Response::count();
        $totalUsers = User::count();
        return view('admin.dashboard', compact('questions', 'totalResponses', 'totalUsers'));
    }

    public function delete($id){
        $question = Question::findOrFail($id);
        if(Auth::user()->role === 'admin'){
            $question->delete();
        } 

        return back();
    }
}
