<?php

use Illuminate\Support\Facades\Route;

// La page d'affichage du formulaire (GET)
Route::get('/', function () {
    return view('admin.dashboard');
});