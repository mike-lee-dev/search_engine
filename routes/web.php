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
    Route::post('/mail-setting-save', [HomeController::class, 'mailSettingSave'])->name('mail-setting-save')->middleware(['verified']);
    Route::get('/result', [HomeController::class, 'result'])->name('result')->middleware(['verified']);
    Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail')->middleware(['verified']);
    Route::get('/history-search/{id}', [HomeController::class, 'historySearch'])->name('history-search')->middleware(['verified']);
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile')->middleware(['verified']);
    Route::post('/modify-profile', [HomeController::class, 'modifyProfile'])->name('modify-profile')->middleware(['verified']);


    Route::get('/users', [HomeController::class, 'adminUsers'])->name('users')->middleware(['verified']);
    Route::post('/users-table', [HomeController::class, 'adminUsersTable'])->name('users-table')->middleware(['verified']);
    Route::post('/change-pw', [HomeController::class, 'changePw'])->name('change-pw')->middleware(['verified']);
    Route::get('/user-profile/{id}', [HomeController::class, 'userProfile'])->name('user-profile')->middleware(['verified']);
    Route::get('/user-delete/{id}', [HomeController::class, 'userDelete'])->name('delete')->middleware(['verified']);

    Route::get('/mails', [HomeController::class, 'adminMailSetting'])->name('mails')->middleware(['verified']);
    Route::post('/mail-manage', [HomeController::class, 'adminMailManage'])->name('mail-manage')->middleware(['verified']);
});

