<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CategoriesController;
use Illuminate\Support\Facades\Auth;

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

Route::prefix('news')->middleware(['auth'])->group(function () {
    Route::get('/{news}', [NewsController::class, 'news'])->name('newsOne'); 
    Route::get('/', [NewsController::class, 'newsAll'])->name('newsAll'); 
    
});
Route::prefix('categories')->middleware(['auth'])->group(function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('allCategories'); 
    Route::get('/{categories}', [NewsController::class, 'someMethod_too'])->name('allCategoryNews');
    
});

Route::middleware(['auth','is_admin'])->group(function () {
    Route::match(['GET', 'POST'], '/add_news', [NewsController::class, 'add_news'])->name("add_news");
    Route::match(['GET', 'POST'], '/delete_news/{news}', [NewsController::class, 'delete_news'])->name("delete_news");
    Route::match(['GET', 'POST'], '/update_news/{news}', [NewsController::class, 'update_news'])->name("update_news");

});


Route::redirect('vodka', '/', 301);

Route::fallback(function () {
    return view('404');
});


Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['auth'])->group(function () {
  
    Route::match(['GET', 'POST'], '/profile', [ProfileController::class, 'update'])->name("updateProfile");
    
});