<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout')->middleware(['verified']);
    Route::get('/home', [HomeController::class, 'search'])->name('home')->middleware(['verified']);
    Route::get('/search', [HomeController::class, 'search'])->name('search')->middleware(['verified']);
    Route::post('/search-result', [HomeController::class, 'searchResult'])->name('search-result')->middleware(['verified']);
    Route::get('/mail-setting', [HomeController::class, 'mailSetting'])->name('mail-setting')->middleware(['verified']);
    Route::get('/result', [HomeController::class, 'result'])->name('result')->middleware(['verified']);
    Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail')->middleware(['verified']);
});

