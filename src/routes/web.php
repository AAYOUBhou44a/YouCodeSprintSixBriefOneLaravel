<?php 

    use App\Http\Controllers\QuestionController;
    use App\Http\Controllers\ResponseController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
    // La page d'affichage du formulaire (GET)
    // Route::get('/', function () {
    //     return view('auth.register');
    // });

    Route::get('/', function(){
        return view('auth.register');
    });

    Route::get('/register', [AuthController::class, 'register']);

    Route::post('/submitRegister', [AuthController::class, 'submitRegister']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    // il faut ajouter ->name('login')  le middleware auth fait ceci en interne : return redirect()->guest(route('login')); 
    Route::post('/submitLogin', [AuthController::class, 'submitLogin']);
    
    
    // redirect marche avec les routes prédéfinié dans web.php
    
    Route::middleware(['auth'])->group(function(){
        // auth Son travail est de poser une seule question à chaque visiteur : « Es-tu authentifié (connecté) ? » 
        // Le mot group permet d'appliquer cette sécurité à plusieurs routes en même temps. 
        Route::get('/showQuestion/{id}',[QuestionController::class, 'showQuestion']);
        Route::get('/questions', [QuestionController::class, 'getQuestions'])->name('questions');
    
        Route::get('/dashboard', function(){
            return view('admin.dashboard');
        })->middleware('can:admin-only')->name('dashboard');
    
        Route::get('/logout', [AuthController::class, 'logout']);

        Route::get('/addQuestion', function(){
            return view('questions.create');//->name('addQuestion') : on le met jamais ici 
        })->name('addQuestion');

        Route::post('/submitQuestion', [QuestionController::class, 'submitQuestion']);

        Route::post('/submitResponse', [ResponseController::class, 'submitResponse']);
    });
    