<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/menu', function () {
    return view('partials.menu');
});

Route::get('/menudashboard', function () {
    return view('partials.menudashboard');
});

Route::get('/catalogue', function () {
    return view('catalogue');
});

Route::get('/profiles', function () {
    return view('profiles', ['user'=>$user = User::where('id', auth()->id())->first()]);
});

Route::get('/dashboard', function () {
    return view('dashboard', ['user'=>$user = User::where('id', auth()->id())->first()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
    Route::resources([
        'users' => UserController::class
    ]);
});

require __DIR__.'/auth.php';
