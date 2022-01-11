<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\MainController;
use App\Http\Controllers\User\CarController;
use App\Http\Controllers\AuthenticateController;
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
Route::get('/', [MainController::class, 'index'])->name('home');

Route::group(['middleware' => 'user'], function () {
    Route::resource('/users', UserController::class);
    Route::resource('/cars', CarController::class);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthenticateController::class, 'create'])->name('register.create');
    Route::post('/register', [AuthenticateController::class, 'store'])->name('register.store');
    Route::get('/login', [AuthenticateController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [AuthenticateController::class, 'login'])->name('login');
    Route::get('/logout', [AuthenticateController::class, 'logout'])->name('logout');
});

Route::get('/logout', [AuthenticateController::class, 'logout'])->name('logout')->middleware('auth');
