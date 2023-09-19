<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class )->name('home');

Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
    Route::get('/', [NewsController::class, 'index'])
        ->name('index');
    Route::get('/{news}/show', [NewsController::class, 'show'])
        ->name('show');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/', AdminController::class)->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});





