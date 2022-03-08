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

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'login'], function(){
    Route::get('/', [App\Http\Controllers\AuthController::class, 'index'])->name('login.form');
    Route::post('/', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
});

Route::group(['prefix' => 'register'], function(){
    Route::get('/doner', [App\Http\Controllers\AuthController::class, 'showDoner'])->name('register.doner');
    Route::get('/donee', [App\Http\Controllers\AuthController::class, 'showDonee'])->name('register.donee');
    Route::post('/', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
});
