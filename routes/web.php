<?php

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

// Route::get('/', function () {
//     return view('welcome');

// });
Route::get('/','ArticleController@index')->name('main_index');
Route::get('/article/{id}','ArticleController@show')->name('show_article');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::put('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
   
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin_index');
    Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('article_create');
    Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('article_create');
    Route::post('/edit/{id}',[App\Http\Controllers\HomeController::class, 'edit'])->name('article_edit');
    Route::put('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('article_create');
    Route::put('/delete', [App\Http\Controllers\HomeController::class, 'destroy'])->name('article_create');

});