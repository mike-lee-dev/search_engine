<?php

use App\Http\Controllers\Auth\LoginController;
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
Route::get('/specific-trans', [HomeController::class, 'specificTrans'])->name('specific-trans');
Route::get('/public-demand', [HomeController::class, 'publicDemand'])->name('public-demand');
Route::post('/change-formula', [HomeController::class, 'changeFormula'])->name('change-formula');

Route::group(['middleware'=>'checkAuth'],function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware(['verified']);
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
    Route::post('/change-favourite', [HomeController::class, 'changeFavourite'])->name('change-favourite')->middleware(['verified']);
    Route::get('/list-favourite', [HomeController::class, 'listFavourite'])->name('list-favourite')->middleware(['verified']);
    Route::get('/send-favourite', [HomeController::class, 'sendFavourite'])->name('send-favourite')->middleware(['verified']);
    Route::post('/comment-save', [HomeController::class, 'commentSave'])->name('comment-save')->middleware(['verified']);
    Route::post('/comment-send', [HomeController::class, 'commentSend'])->name('comment-send')->middleware(['verified']);

    Route::get('/users', [HomeController::class, 'adminUsers'])->name('users')->middleware(['verified']);
    Route::post('/users-table', [HomeController::class, 'adminUsersTable'])->name('users-table')->middleware(['verified']);
    Route::post('/change-pw', [HomeController::class, 'changePw'])->name('change-pw')->middleware(['verified']);
    Route::post('/account-type', [HomeController::class, 'accountType'])->name('account-type')->middleware(['verified']);
    Route::get('/user-profile/{id}', [HomeController::class, 'userProfile'])->name('user-profile')->middleware(['verified']);
    Route::get('/user-delete/{id}', [HomeController::class, 'userDelete'])->name('delete')->middleware(['verified']);

    Route::get('/mails-A', [HomeController::class, 'adminMailSettingA'])->name('mails-A')->middleware(['verified']);
    Route::get('/mails-B', [HomeController::class, 'adminMailSettingB'])->name('mails-B')->middleware(['verified']);
    Route::get('/mails-C', [HomeController::class, 'adminMailSettingC'])->name('mails-C')->middleware(['verified']);
    Route::post('/mail-manage', [HomeController::class, 'adminMailManage'])->name('mail-manage')->middleware(['verified']);

});

