<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ReadingsController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth')->group(function (){

    Route::get('/home', [HomeController::class, 'home']);

    Route::get('/apartments', [ApartmentController::class, 'home']);

    Route::get('/readings', [ReadingsController::class, 'home']);

    Route::get('/profile', [ProfileController::class, 'home']);
    Route::put('/profile', [ProfileController::class, 'edit']);
    Route::delete('/profile', [ProfileController::class, 'delete']);

});

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
});