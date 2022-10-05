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
// */


Route::get('/auth', [AuthorizationController::class, 'index'])->name('auth');
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::match(array('GET', 'POST'), '/add_news', [AddnewsController::class, 'index'])->name("add_news");
Route::get('/save', [IndexController::class, 'save'])->name('save');
Route::get('/download', [IndexController::class, 'download'])->name("download");
Route::get('/categories', [CategoriesController::class, 'index'])->name('allCategories'); //Все категории
Route::get('categories/{id}', [NewsController::class, 'someMethod_too'])->name('allNews'); //Все новости категории
Route::get('/news/{id}', [NewsController::class, 'someMethod'])->name('newsOne'); //Конкретная новость

Route::get('/json', [NewsController::class, 'getJson'])->name('json'); 
Route::redirect('vodka', '/', 301);

Route::fallback(function () {
    return view('404');
});

