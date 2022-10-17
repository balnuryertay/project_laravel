<?php

use App\Http\Controllers\Auth2\RegisterControllerr;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return redirect()->route('foods.index');
});

Route::middleware('auth')->group(function(){
    Route::resource('foods', FoodController::class)->except('index','show');
    Route::resource('feedbacks', FeedbackController::class)->only('edit', 'update', 'destroy', 'store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::resource('foods', FoodController::class)->only('index','show');
Route::resource('feedbacks', FeedbackController::class);

Route::get('/foods/category/{category}', [FoodController::class, 'foodsByCategory'])->name('foods.category');
Route::get('/category', [FoodController::class, 'category'])->name('category');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterControllerr::class, 'create'])->name('register.form');
Route::post('/register', [RegisterControllerr::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
