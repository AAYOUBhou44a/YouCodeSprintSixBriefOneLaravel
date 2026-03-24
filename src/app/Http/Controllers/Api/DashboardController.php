<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Response;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $questions = Question::with('user')->latest()->get();
        $totalResponses = Response::count();
        $totalUsers = User::count();
        return response()->json([
            'questions' => $questions,
            'totalResponses' => $totalResponses,
            'totalUsers' => $totalUsers
        ]);
    }
}
