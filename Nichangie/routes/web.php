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

Route::group(['prefix' => 'verify'], function(){
    Route::get('/', [App\Http\Controllers\AuthController::class, 'verify'])->name('verify.phone');
    Route::post('/verify-otp', [App\Http\Controllers\AuthController::class, 'verifyOtp'])->name('verify.otp');
});

Route::get('/verify-test', [App\Http\Controllers\AuthController::class, 'verifyTest'])->name('verify.test');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/how-it-works', [App\Http\Controllers\HomeController::class, 'howItWorks'])->name('how');

Route::group(['prefix' => 'campaigns'], function(){
    Route::get('/', [App\Http\Controllers\StoryController::class, 'index'])->name('campaign')->middleware('auth');
    Route::get('/all', [App\Http\Controllers\StoryController::class, 'getAll'])->name('campaign.all');
    Route::get('/{id}', [App\Http\Controllers\StoryController::class, 'show'])->name('campaign.show');
    Route::post('/', [App\Http\Controllers\StoryController::class, 'create'])->name('campaign.create')->middleware('auth');
});

Route::group(['prefix' => 'categories'], function(){
    Route::get('/', [App\Http\Controllers\CategoryController::class, 'getAll'])->name('user.category');
});

Route::group(['prefix' => 'donations'], function(){
    Route::post('/', [App\Http\Controllers\DonationController::class, 'create'])->name('donate.create');
});

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');

Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => 'user.type', 'prefix' => 'admin'], function(){
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.home');

        Route::group(['prefix' => 'categories'], function(){
            Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
            Route::get('/create', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
            Route::post('/', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
        });
    });
});