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

Route::group(['prefix' => 'home'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('donee.home')->middleware('auth');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware('auth');
    Route::post('/profile', [App\Http\Controllers\HomeController::class, 'editProfile'])->name('profile.edit')->middleware('auth');
});

Route::get('/how-it-works', [App\Http\Controllers\HomeController::class, 'howItWorks'])->name('how');

Route::get('/privacypolicy', [App\Http\Controllers\HomeController::class, 'privacyPolicy'])->name('privacy');

Route::group(['prefix' => 'contact-us'], function(){
    Route::get('/', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
    Route::post('/', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
});

Route::group(['prefix' => 'campaigns'], function(){
    Route::get('/', [App\Http\Controllers\StoryController::class, 'index'])->name('campaign')->middleware('auth');
    Route::get('/featured', [App\Http\Controllers\StoryController::class, 'getAll'])->name('campaign.all');
    Route::get('/latest', [App\Http\Controllers\StoryController::class, 'getLatest'])->name('campaign.latest');
    Route::get('/my-campaings', [App\Http\Controllers\StoryController::class, 'getStories'])->name('me.campaign')->middleware('auth');
    Route::get('/{id}', [App\Http\Controllers\StoryController::class, 'show'])->name('campaign.show');
    Route::get('/export/{id}', [App\Http\Controllers\StoryController::class, 'exportCampaignData'])->name('campaign.export')->middleware('auth');
    Route::post('/', [App\Http\Controllers\StoryController::class, 'create'])->name('campaign.create')->middleware('auth');
    Route::post('/close', [App\Http\Controllers\StoryController::class, 'close'])->name('campaign.close')->middleware('auth');
});

Route::group(['prefix' => 'categories'], function(){
    Route::get('/', [App\Http\Controllers\CategoryController::class, 'getCategories'])->name('user.category');
    Route::get('/{name}', [App\Http\Controllers\CategoryController::class, 'getCategoryCampaigns'])->name('category.campaigns');
});

Route::group(['prefix' => 'donations'], function(){
    Route::get('/', [App\Http\Controllers\DonationController::class, 'getDonations'])->name('donation')->middleware('auth');
    Route::post('/', [App\Http\Controllers\DonationController::class, 'create'])->name('donate.create');
});

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');

Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => 'user.type', 'prefix' => 'admin'], function(){
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('admin.home');

        Route::group(['prefix' => 'categories'], function(){
            Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
            Route::get('/create', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
            Route::post('/', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
        });

        Route::group(['prefix' => 'campaigns'], function(){
            Route::get('/', [App\Http\Controllers\StoryController::class, 'getAllStories'])->name('story');
        });

        Route::group(['prefix' => 'users'], function(){
            Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user');
            Route::get('/{id}', [App\Http\Controllers\UserController::class, 'getUser'])->name('user.details');
        });

        Route::group(['prefix' => 'donations'], function(){
            Route::get('/', [App\Http\Controllers\DonationController::class, 'getAllDonations'])->name('donation.all');
        });

        Route::group(['prefix' => 'testimonials'], function(){
            Route::get('/', [App\Http\Controllers\TestimonialController::class, 'index'])->name('testimonial');
            Route::get('/create', [App\Http\Controllers\TestimonialController::class, 'show'])->name('testimonial.show');
            Route::post('/', [App\Http\Controllers\TestimonialController::class, 'create'])->name('testimonial.create');
            Route::delete('/', [App\Http\Controllers\TestimonialController::class, 'delete'])->name('testimonial.delete');
        });
    });

    Route::group(['prefix' => 'transactions'], function(){
        Route::get('/', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction');
        Route::post('/', [App\Http\Controllers\TransactionController::class, 'requestWithdraw'])->name('transaction.request');
        Route::get('/withdraw/requests', [App\Http\Controllers\TransactionController::class, 'withdrawRequests'])->name('transaction.withdraw.request')->middleware('user.type');
        Route::post('/withdraw/accept', [App\Http\Controllers\TransactionController::class, 'acceptWithdraw'])->name('withdraw.accept')->middleware('user.type');
        Route::post('/withdraw/reject', [App\Http\Controllers\TransactionController::class, 'rejectWithdraw'])->name('withdraw.reject')->middleware('user.type');
        Route::any('/withdraw/{userid}', [App\Http\Controllers\TransactionController::class, 'withdraw'])->name('transaction.withdraw');
    });
});