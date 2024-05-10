<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\PinCodeController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/generateOtp', [AuthController::class,'generateOtp'])->name('generateOtp');
Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);;
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::group(['prefix' => 'admin', 'as' => 'admin.' ,'middleware' => [AdminAuth::class]] , function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('users', UserController::class);
    Route::resource('states', StateController::class);
    Route::resource('cities', CityController::class);
    Route::resource('pinCodes', PinCodeController::class);
});

Route::group(['prefix' => 'user', 'as' => 'user.' ,'middleware' => ['auth']] , function(){
    Route::get('/', [ProfileController::class,'index'])->name('index');
});
