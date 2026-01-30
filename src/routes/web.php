    <?php

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

    Route::get('/login', [AuthController::class, 'login']);

    Route::post('/submitLogin', [AuthController::class, 'submitLogin']);
    
    // redirect marche avec les routes prédéfinié dans web.php
    Route::get('/questions', function(){
        return view('questions.index');
    });

    Route::get('/dashboard', function(){
        return view('admin.dashboard')->name('dashboard');
    });

    
    // Route::get('/questions_index', function(){
    //     return view('questions.index')->name('index');
    // });
    