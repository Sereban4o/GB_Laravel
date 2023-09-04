<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\InfoController;
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

Route::get('/', [HomeController::class, 'index'] );

Route::get('/admin', [Admin\IndexController::class, 'index'] );

Route::get('/hello/{name}', static function(string $name): string{
    return  "Hello, {$name}";
});

Route::get('/user/{name}', static function(string $name): string{
    return  "Приветствую, {$name}";
});

Route::get('/info', [InfoController::class, 'index']);

Route::get('/news', [NewsController::class, 'news'])
->name('news');

Route::get('/news/{category}/{id}', [NewsController::class, 'newsOne'])
->where('id', '\d+')
->name('newsOne');
