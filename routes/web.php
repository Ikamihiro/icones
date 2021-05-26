<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\IconesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Website\CommonController;
use App\Http\Controllers\Website\IconesController as WebsiteIconesController;
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

Route::get('/about', [CommonController::class, 'about'])
    ->name('about');

Route::group(['prefix' => 'icones'], function() {
    Route::get('/', [WebsiteIconesController::class, 'index'])
        ->name('website.icones.index');
    
    Route::get('/{icone}', [WebsiteIconesController::class, 'show'])
        ->name('website.icones.show');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::resource('icones', IconesController::class);

    Route::group(['middleware' => 'isAdmin'], function () {
        Route::resource('users', UsersController::class);

        Route::get('/user/generate_password/{user}', [UsersController::class, 'generateNewPassword'])
            ->name('generate.password');
    });

    Route::get('/user/change', [UsersController::class, 'showChangePasswordForm'])
        ->name('show.changePassword');

    Route::post('/user/change', [UsersController::class, 'changePassword'])
        ->name('store.changePassword');
});
