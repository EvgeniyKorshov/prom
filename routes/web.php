<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\AddnewsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/auth', [AuthorizationController::class, 'index'])->name('auth');
Route::get('/add_news', [AddnewsController::class, 'index'])->name('add_news');
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/news/categories', [CategoriesController::class, 'index'])->name('categories');

Route::get('/news/categories/economy', [NewsController::class, 'index'])->name('categories.economy');

Route::prefix('news/categories')->group(function(){
    Route::get('/1', [NewsController::class, 'sport'])->name('sport');
    Route::get('/2', [NewsController::class, 'economy'])->name('economy');
    Route::get('/3', [NewsController::class, 'politics'])->name('politics');
    Route::get('/4', [NewsController::class, 'auto'])->name('auto');
    Route::get('/5', [NewsController::class, 'science'])->name('science');
});

Route::prefix('/news/categories/science')->group(function(){
    Route::get('/1', [NewsController::class, 'science_1'])->name('science_1');
    Route::get('/2', [NewsController::class, 'science_2'])->name('science_2');
    Route::get('/3', [NewsController::class, 'science_3'])->name('science_3');
    Route::get('/4', [NewsController::class, 'science_4'])->name('science_4');
    Route::get('/5', [NewsController::class, 'science_5'])->name('science_5');
});

Route::prefix('/news/categories/sport')->group(function(){
    Route::get('/1', [NewsController::class, 'sport_1'])->name('sport_1');
    Route::get('/2', [NewsController::class, 'sport_2'])->name('sport_2');
    Route::get('/3', [NewsController::class, 'sport_3'])->name('sport_3');
    Route::get('/4', [NewsController::class, 'sport_4'])->name('sport_4');
    Route::get('/5', [NewsController::class, 'sport_5'])->name('sport_5');
});

Route::prefix('/news/categories/politics')->group(function(){
    Route::get('/1', [NewsController::class, 'politics_1'])->name('politics_1');
    Route::get('/2', [NewsController::class, 'politics_2'])->name('politics_2');
    Route::get('/3', [NewsController::class, 'politics_3'])->name('politics_3');
    Route::get('/4', [NewsController::class, 'politics_4'])->name('politics_4');
    Route::get('/5', [NewsController::class, 'politics_5'])->name('politics_5');
});

Route::prefix('/news/categories/economy')->group(function(){
    Route::get('/1', [NewsController::class, 'economy_1'])->name('economy_1');
    Route::get('/2', [NewsController::class, 'economy_2'])->name('economy_2');
    Route::get('/3', [NewsController::class, 'economy_3'])->name('economy_3');
    Route::get('/4', [NewsController::class, 'economy_4'])->name('economy_4');
    Route::get('/5', [NewsController::class, 'economy_5'])->name('economy_5');
});

Route::prefix('/news/categories/auto')->group(function(){
    Route::get('/1', [NewsController::class, 'auto_1'])->name('auto_1');
    Route::get('/2', [NewsController::class, 'auto_2'])->name('auto_2');
    Route::get('/3', [NewsController::class, 'auto_3'])->name('auto_3');
    Route::get('/4', [NewsController::class, 'auto_4'])->name('auto_4');
    Route::get('/5', [NewsController::class, 'auto_5'])->name('auto_5');
});

Route::redirect('vodka', '/', 301);

Route::fallback(function () {
    return view('404');
});

