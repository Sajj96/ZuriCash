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

Route::group(['prefix' => 'campaigns'], function(){
    Route::get('/', [App\Http\Controllers\CampaignController::class, 'index'])->name('campaign')->middleware('auth');
    Route::get('/all', [App\Http\Controllers\CampaignController::class, 'getAll'])->name('campaign.all');
    Route::get('/{id}', [App\Http\Controllers\CampaignController::class, 'show'])->name('campaign.show');
    Route::post('/', [App\Http\Controllers\CampaignController::class, 'create'])->name('campaign.create')->middleware('auth');
});

Route::group(['prefix' => 'donations'], function(){
    Route::post('/', [App\Http\Controllers\DonationController::class, 'create'])->name('donate.create');
});

Route::middleware(['auth'])->group(function () {
});