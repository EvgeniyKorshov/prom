<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\IndexController;

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
Route::get('/authorization', [AuthorizationController::class, 'index']);
Route::get('/add_news', [AddnewsController::class, 'index']);
 
Route::get('/', [IndexController::class, 'index']);

Route::get('/news/categories', [NewsController::class, 'index']);

Route::get('/news/categories/1', [NewsController::class, 'sport']);
Route::get('/news/categories/2', [NewsController::class, 'economy']);
Route::get('/news/categories/3', [NewsController::class, 'politics']);
Route::get('/news/categories/4', [NewsController::class, 'auto']);
Route::get('/news/categories/5', [NewsController::class, 'science']);

Route::get('/news/categories/science/1', [NewsController::class, 'science_1']);
Route::get('/news/categories/science/2', [NewsController::class, 'science_2']);
Route::get('/news/categories/science/3', [NewsController::class, 'science_3']);
Route::get('/news/categories/science/4', [NewsController::class, 'science_4']);
Route::get('/news/categories/science/5', [NewsController::class, 'science_5']);

Route::get('/news/categories/sport/1', [NewsController::class, 'sport_1']);
Route::get('/news/categories/sport/2', [NewsController::class, 'sport_2']);
Route::get('/news/categories/sport/3', [NewsController::class, 'sport_3']);
Route::get('/news/categories/sport/4', [NewsController::class, 'sport_4']);
Route::get('/news/categories/sport/5', [NewsController::class, 'sport_5']);

Route::get('/news/categories/politics/1', [NewsController::class, 'politics_1']);
Route::get('/news/categories/politics/2', [NewsController::class, 'politics_2']);
Route::get('/news/categories/politics/3', [NewsController::class, 'politics_3']);
Route::get('/news/categories/politics/4', [NewsController::class, 'politics_4']);
Route::get('/news/categories/politics/5', [NewsController::class, 'politics_5']);

Route::get('/news/categories/economy/1', [NewsController::class, 'economy_1']);
Route::get('/news/categories/economy/2', [NewsController::class, 'economy_2']);
Route::get('/news/categories/economy/3', [NewsController::class, 'economy_3']);
Route::get('/news/categories/economy/4', [NewsController::class, 'economy_4']);
Route::get('/news/categories/economy/5', [NewsController::class, 'economy_5']);

Route::get('/news/categories/auto/1', [NewsController::class, 'auto_1']);
Route::get('/news/categories/auto/2', [NewsController::class, 'auto_2']);
Route::get('/news/categories/auto/3', [NewsController::class, 'auto_3']);
Route::get('/news/categories/auto/4', [NewsController::class, 'auto_4']);
Route::get('/news/categories/auto/5', [NewsController::class, 'auto_5']);