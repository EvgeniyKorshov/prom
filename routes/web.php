<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ParserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;


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

Route::get('auth/git', [LoginController::class, 'loginGit'])->name('loginGit'); 
Route::get('auth/git/response', [LoginController::class, 'responseGit'])->name('responseGit'); 
Route::match(['GET', 'POST'], '/profile', [ProfileController::class, 'update'])->name("updateProfile");

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/parser', [ParserController::class, 'index'])->name("parser");
});

Route::redirect('vodka', '/', 301);

Route::fallback(function () {
    return view('404');
});
