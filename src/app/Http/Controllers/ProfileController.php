<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile(){
        $user = User::with(['questions', 'likes'])->where('id', Auth::id())->first();
        return view('profile.profile', compact('user'));
    }
}
