<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ResponseRequest;


class ResponseController extends Controller
{
    public function submitResponse(ResponseRequest $request){
        $response = Response::create([
            'response' => $request->response,
            'question_id' => $request->question_id,
            'user_id' => Auth::id()
        ]);
        if($response){
            return back();
        }
    }
}
