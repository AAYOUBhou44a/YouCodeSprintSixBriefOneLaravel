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

    Route::middleware(['auth'])->group(function(){
        // auth Son travail est de poser une seule question à chaque visiteur : « Es-tu authentifié (connecté) ? » 
        // Le mot group permet d'appliquer cette sécurité à plusieurs routes en même temps. 
        Route::get('/questions', function(){
            return view('questions.index');
        });
    
        Route::get('/dashboard', function(){
            return view('admin.dashboard');
        })->middleware('can:only-admin')->name('dashboard');
    
        Route::get('/logout', [AuthController::class, 'logout']);
        // Route::get('/questions_index', function(){
        //     return view('questions.index')->name('index');
        // });
    });
    