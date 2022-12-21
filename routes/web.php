<?php

use App\Http\Controllers\Adm\CategoryController;
use App\Http\Controllers\Adm\RoleController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth2\RegisterControllerr;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;

Route::get('/', function (){
    return redirect()->route('home');
});

Route::get('lang/{lang}', [LangController::class, 'switchlang'])->name('switch.lang');

Route::middleware('auth')->group(function(){
    Route::get('/users/edit/{user}',[RegisterControllerr::class,'edit'])->name('profile.edit');
    Route::put('/users/update/{user}',[RegisterControllerr::class,'update'])->name('profile.update');
    Route::get('/balance/{user}',[RegisterControllerr::class,'balance'])->name('users.balance');
    Route::put('/balance/{user}/update',[RegisterControllerr::class,'addBalance'])->name('balance.update');

    Route::resource('/foods', FoodController::class)->except('index','show');
    Route::resource('/feedbacks', FeedbackController::class)->only('edit', 'update', 'destroy', 'store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/like', [FoodController::class, 'likes'])->name('foods.likes');
    Route::post('/foods/{food}/liked', [FoodController::class, 'like'])->name('foods.liked');
    Route::post('/foods/{food}/unliked', [FoodController::class, 'unlike'])->name('foods.unliked');

    Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');
    Route::post('/basket/{food}/add', [BasketController::class, 'basketAdd'])->name('basket.add');
    Route::post('/basket', [BasketController::class, 'buy'])->name('basket.buy');
    Route::delete('/basket/{food}/delete', [BasketController::class, 'basketDelete'])->name('basket.destroy');
    Route::get('/foods/basket', [FoodController::class, 'courier'])->name('basket.courier');
    Route::put('/basket/{basket}/delivered', [FoodController::class, 'delivered'])->name('basket.delivered');

    Route::prefix('adm')->as('adm.')->middleware('hasrole:admin,moderator')->group(function (){
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::delete('/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::put('/users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
        Route::put('/users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');

        Route::get('/basket', [UserController::class, 'basket'])->name('basket.index');
        Route::put('/basket/{basket}/sent', [UserController::class, 'sent'])->name('basket.sent');

        Route::get('/feedbacks', [\App\Http\Controllers\Adm\FeedbackController::class, 'index'])->name('feedbacks.index');
        Route::delete('/feedbacks/delete/{feedback}', [\App\Http\Controllers\Adm\FeedbackController::class, 'destroy'])->name('feedbacks.destroy');

        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
        Route::delete('/roles/delete/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

        Route::delete('/foods/delete/{food}', [\App\Http\Controllers\Adm\FoodController::class, 'destroy'])->name('foods.destroy');
        Route::get('/foods', [\App\Http\Controllers\Adm\FoodController::class, 'index'])->name('foods.index');
        Route::get('/foods/search', [\App\Http\Controllers\Adm\FoodController::class, 'index'])->name('foods.search');
        Route::get('/foods/{food}/edit', [\App\Http\Controllers\Adm\FoodController::class, 'edit'])->name('foods.edit');
        Route::put('/foods/{food}', [\App\Http\Controllers\Adm\FoodController::class, 'update'])->name('foods.update');
        Route::get('/foods/create', [\App\Http\Controllers\Adm\FoodController::class, 'create'])->name('foods.create');
        Route::post('/foods/store', [\App\Http\Controllers\Adm\FoodController::class, 'store'])->name('foods.store');
    });
});

Route::resource('foods', FoodController::class)->only('index','show', 'create');
Route::resource('feedbacks', FeedbackController::class);

Route::get('/foods/category/{category}', [FoodController::class, 'foodsByCategory'])->name('foods.category');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterControllerr::class, 'create'])->name('register.form');
Route::post('/register', [RegisterControllerr::class, 'register'])->name('register');

Route::get('/account',[ProfileController::class,'index'])->name('account');

Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
