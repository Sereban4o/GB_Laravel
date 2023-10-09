<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ResourceController as  AdminResourceController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\UserController as UserController;
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



Route::prefix('admin')->name('admin.')->middleware(['auth','is.admin'])->group(function () {
    Route::get('/', AdminController::class)->name('index');
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/categories', AdminCategoryController::class);
<<<<<<< Updated upstream
    Route::resource('/users', UserController::class);
=======
    Route::resource('/resources', AdminResourceController::class);
    Route::get('/parser', ParserController::class)->name('parser');
    Route::post('image-upload', [AdminNewsController::class, 'storeImage'])->name('image.upload');
    Route::prefix('users')->name('users.')->middleware(['auth', 'is.admin'])->group(function () {
        Route::get('/users', [AdminUserController::class, 'index'])->name('index');
        Route::get('/users/toggleAdmin/{user}', [AdminUserController::class, 'toggleAdmin'])->name('toggleAdmin');
        Route::get('/users/edit/{user}', [AdminUserController::class, 'edit'])->name('edit');
        Route::put('/users/update/{user}', [AdminUserController::class, 'update'])->name('update');
    });
>>>>>>> Stashed changes
});

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{news}/show', [NewsController::class, 'show'])->name('show');
});


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
