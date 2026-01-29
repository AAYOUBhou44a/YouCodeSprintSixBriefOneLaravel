<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class AuthController extends Controller
// {
//     public function login(){
//         return view('auth.login');
//     }
//     public function sbmitLogin(Request $request){
//         $request->validate([
//             'name' => 'required',
//             'email' => ['required', 'email'],
//             'password' => ['required', 'min:6']
//         ]);
        
//         $credentials=$request->only('email', 'password');
//         if(Auth::attempt($credentials)){
//             Auth::session()->regenerate();
//             if(Auth::user()->role === 'admin'){
//                 return redirect()->route('');
//             }
//         }
//     }
//     public function register(){
//         return view('auth.register');
//     }
//     public function submitRegister(RegisterRequest $request){
//         $request->validate([
//             'email' => 'required|email|unique:users',
//             'password' => ''
//         ]);
//         $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//             'role' => 'user'
//         ]);
//         Auth::login($user);
//         return redirect()->route('auth.login');
//     }
    
//     public function logout(){
//         Auth::logout();

//         return redirect()->route();
//     }
// }
