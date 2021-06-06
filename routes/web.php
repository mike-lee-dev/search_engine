<?php

use Illuminate\Support\Facades\Auth;
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

    return redirect('/login');
});

Auth::routes(['verify' => true]);

Route::group(['middleware'=>'checkAuth'],function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'search'])->name('home')->middleware(['verified']);
    Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search')->middleware(['verified']);
    Route::get('/mail-setting', [App\Http\Controllers\HomeController::class, 'mailSetting'])->name('mail-setting')->middleware(['verified']);
    Route::get('/result', [App\Http\Controllers\HomeController::class, 'result'])->name('result')->middleware(['verified']);
    Route::get('/detail', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail')->middleware(['verified']);
});

