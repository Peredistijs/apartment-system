<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MeterController;
use App\Http\Controllers\AdminController;

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

    Route::get('/profile', [ProfileController::class, 'home']);
    Route::put('/profile', [ProfileController::class, 'edit']);
    Route::delete('/profile', [ProfileController::class, 'delete']);

    Route::get('/apartments/create', [ApartmentController::class, 'create']);
    Route::post('/apartments', [ApartmentController::class, 'store']);
    Route::get('/apartments/list', [ApartmentController::class, 'list']);

    Route::get('/apartments/{apartment}/edit', [ApartmentController::class, 'edit']);
    Route::put('/apartments/{apartment}', [ApartmentController::class, 'update']);
    Route::delete('/apartments/{apartment}', [ApartmentController::class, 'delete']);

    Route::put('/apartments/{apartment}/assign-resident', [ApartmentController::class, 'assignResident']);
    Route::put('/apartments/{apartment}/remove-resident', [ApartmentController::class, 'removeResident']);
    
    Route::get('/apartments/{apartment}/meter/create', [MeterController::class, 'create']); //dont need this in current design
    Route::post('/apartments/{apartment}/meter', [MeterController::class, 'store']);
    Route::get('/apartments/{apartment}/meter/add', [MeterController::class, 'add']);
    Route::delete('/meters/{meter}', [MeterController::class, 'delete']);

    //owner readings
    Route::get('/meters/{meter}/readings', [ReadingController::class, 'show']);
    Route::put('/readings/{reading}/status', [ReadingController::class, 'updateStatus']);

    //resident readings
    Route::get('/readings', [ReadingController::class, 'home']);
    Route::post('/readings/store', [ReadingController::class, 'store']);

    //export
    Route::get('/apartments/{apartment}/readings/export', [ReadingController::class, 'exportReadings']);


    //admin users 
    Route::get('/admin/users', [AdminController::class, 'uhome']);
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser']);
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser']);
    Route::delete('/admin/users/{user}', [AdminController::class, 'udelete']);
    
    //admin apartments
    Route::get('/admin/apartments', [AdminController::class, 'ahome']);
    Route::get('/admin/apartments/{apartment}/edit', [AdminController::class, 'editApartment']);
    Route::put('/admin/apartments/{apartment}', [AdminController::class, 'updateApartment']);
    Route::delete('/admin/apartments/{apartment}', [AdminController::class, 'adelete']);
    
    
});

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
});