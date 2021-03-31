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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/detail/{slug_url}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');

Auth::routes();


Route::middleware('auth')->group(static function () {
    Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
    Route::post('/blog', [App\Http\Controllers\BlogController::class, 'store'])->name('store');
    Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'edit'])->name('edit');
    Route::post('/blog/{id}', [App\Http\Controllers\BlogController::class, 'update'])->name('update');
    Route::get('/create', [App\Http\Controllers\BlogController::class, 'create'])->name('create');
    Route::get('/blog/{id}/hapus', [App\Http\Controllers\BlogController::class, 'destroy'])->name('hapus');
});

// Route::middleware('auth')->group(static function () {
//     //...
//     Route::resource('profile', '\App\Http\Controllers\Admin\ProfileController');
// });