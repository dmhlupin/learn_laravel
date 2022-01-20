<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('start');
});

// admin
// группировка роутов и их групповое именование
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

//news

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index'); //Даем имя для удаления жесткой связи в ссылках

Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+') // проверяем параметр на целое число
    ->name('news.show');

Route::get('/category', [CategoryController::class, 'index'])
    ->name('category.index');
Route::get('/category/{title}', [CategoryController::class, 'show'])
    ->name('category.show');