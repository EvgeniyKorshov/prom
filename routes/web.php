<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\AddNewsController;
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
Route::match(array('GET', 'POST'), '/add_news', [NewsController::class, 'add_news'])->name("add_news");
Route::match(array('GET', 'POST'), '/delete_news/{news}', [NewsController::class, 'delete_news'])->name("delete_news");
Route::match(array('GET', 'POST'), '/update_news/{news}', [NewsController::class, 'update_news'])->name("update_news");

Route::get('/auth', [AuthorizationController::class, 'index'])->name('auth');
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/save', [IndexController::class, 'save'])->name('save');
Route::get('/categories', [CategoriesController::class, 'index'])->name('allCategories'); //Все категории
Route::get('categories/{categories}', [NewsController::class, 'someMethod_too'])->name('allCategoryNews'); //Все новости категории
Route::get('/news/{news}', [NewsController::class, 'news'])->name('newsOne'); //Конкретная новость
Route::get('/news', [NewsController::class, 'newsAll'])->name('newsAll'); //Конкретная новость

Route::redirect('vodka', '/', 301);

Route::fallback(function () {
    return view('404');
});

