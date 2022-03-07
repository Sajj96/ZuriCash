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

Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');

Route::group(['prefix' => 'register'], function(){
    Route::get('/', [App\Http\Controllers\AuthController::class, 'show'])->name('register.form');
    Route::post('/', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
});
