<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\IconesController;
use App\Http\Controllers\Admin\UsersController;
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
    return view('website.home');
})->name('root');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    Route::get('/user/change', [UsersController::class, 'showChangePasswordForm'])->name('show.changePassword');
    Route::post('/user/change', [UsersController::class, 'changePassword'])->name('store.changePassword');
    
    Route::resource('icones', IconesController::class);
});
