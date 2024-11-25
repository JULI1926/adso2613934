<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\GamesController;
use App\Models\User;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Game;
use App\Models\Categorie;
use Illuminate\Http\Request;

Route::get('/', function () {
    $sliders = Game::where('slider', 1)->get();    
    return view('welcome')->with('sliders', $sliders);
});


Route::get('/menu', function () {
    return view('partials.menu');
});

Route::get('/menudashboard', function () {
    return view('partials.menudashboard');
});

Route::get('/catalogue', function () {
    $categories = App\Models\Category::all();
    $games = App\Models\Game::all();
    return view('catalogue')->with('categories', $categories)->with('games', $games);                            
});

Route::get('catalogue/{id}', function(){
    $game = App\Models\Game::find(request()->id);
    //dd($game->toArray());
    return view('view-game')->with('game', $game);
});

Route::get('catalogue/add/{id}', function() {
    $game = App\Models\Game::find(request()->id);
    dd($game->toArray());
});

Route::post('gamesbycat', function(Request $request) {
    if ($request->fcat == 'All') {
        // All Categories
        $categories = App\Models\Category::all();
        $games      = App\Models\Game::all();
        return view('gamesbycat')->with('categories', $categories)
                                 ->with('games', $games);
    } else {
        // By Category
        $idcat    = App\Models\Category::where('name', $request->fcat)->first();
        $category = App\Models\Category::where('id', $idcat->id)->first();
        $games    = App\Models\Game::where('category_id', $idcat->id)->get();
        return view('gamesbycat')->with('category', $category)
                                 ->with('games', $games);
    }
});











Route::get('/profiles', function () {
    return view('profiles', ['user'=>$user = User::where('id', auth()->id())->first()]);
});

Route::get('/dashboard', function () {
    return view('dashboard', ['user'=>$user = User::where('id', auth()->id())->first()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profiles', function () {
        return view('profiles', ['user'=>$user = User::where('id', auth()->id())->first()]);
    });
    
    Route::resources([
        'users' => UserController::class,
        'categories' => CategorieController::class,
        'games' => GamesController::class
    ]);
});

Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');

Route::post('users/search', [UserController::class, 'search']);

//Exports
Route::get('exports/users/pdf', [UserController::class, 'pdf']);
Route::get('exports/users/excel', [UserController::class, 'excel']);

Route::get('exports/games/pdf', [GamesController::class, 'pdf']);
Route::get('exports/games/excel', [GamesController::class, 'excel']);

//Search
Route::post('categories/search', [CategorieController::class, 'search']);
Route::post('games/search', [GamesController::class, 'search']);

//Import
Route::post('import/users', [UserController::class, 'import']);


require __DIR__.'/auth.php';
