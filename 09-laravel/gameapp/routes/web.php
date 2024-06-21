<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/games/list', function () {       
    $games = App\Models\Game::all();
    //echo var_dump($games);
    dd($games->toArray());
});


Route::get('/game/{id}', function () {       
    $game = App\Models\Game::find(request()->id);
    dd($game->toArray());
});


Route::get('/game/{id}', function () {       
    $game = App\Models\Game::find(request()->id);
    dd($game->toArray());
});

Route::get('/users', function () {
    $users = User::latest()->with('birthdate')->limit(20)->get();

    if (view()->exists('users.index')) {
        return View::make('users.index', compact('users', 'currentDate'));
    } else {
        $usersWithAge = [];
        $currentDate = Carbon::now();

        foreach ($users as $user) {
            $age = null;  

            
            if ($user->birthdate) {
                $age = $currentDate->diffInYears($user->birthdate);
            }

            $usersWithAge[] = [
                'name' => $user->name,
                'email' => $user->email,
                'birthdate' => $user->birthdate,
                'age' => $age,
            ];
        }

        return $usersWithAge;
    }
});

Route::get('/games', function () {       
    $games = App\Models\Game::all();
    return view('listgames')->with('games', $games);
});
