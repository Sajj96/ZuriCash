<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/verify', [App\Http\Controllers\AuthController::class, 'verify'])->name('verify.phone');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'campaign'], function(){
    Route::get('/', [App\Http\Controllers\CauseController::class, 'index'])->name('cause')->middleware('auth');
    Route::get('/{id}', [App\Http\Controllers\CauseController::class, 'show'])->name('cause.show');
    Route::post('/', [App\Http\Controllers\CauseController::class, 'create'])->name('cause.create')->middleware('auth');
});

Route::middleware(['auth'])->group(function () {
});