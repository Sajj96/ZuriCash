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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/payments', [App\Http\Controllers\HomeController::class, 'showPaymentInformationPage'])->name('payment');

Route::middleware(['auth','active.user'])->group(function ()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'referrals'], function(){
        Route::get('/', [App\Http\Controllers\ReferralController::class, 'index'])->name('referral');
    });

    Route::group(['prefix' => 'team'], function(){
        Route::get('/', [App\Http\Controllers\TeamController::class, 'index'])->name('team.level1');
        Route::get('/level_two', [App\Http\Controllers\TeamController::class, 'showLevelTwo'])->name('team.level2');
        Route::get('/level_three', [App\Http\Controllers\TeamController::class, 'showLevelThree'])->name('team.level3');
    });

    Route::group(['prefix' => 'transactions'], function(){
        Route::get('/', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction');
        Route::post('/', [App\Http\Controllers\TransactionController::class, 'getPaid'])->name('payment');
        Route::get('/me', [App\Http\Controllers\TransactionController::class, 'userTransactions'])->name('history');
        Route::get('/withdraw', [App\Http\Controllers\TransactionController::class, 'show'])->name('withdraw');
        Route::post('/withdraw/accept', [App\Http\Controllers\TransactionController::class, 'acceptWithdraw'])->name('withdraw.accept')->middleware('user.type');
        Route::post('/withdraw/decline', [App\Http\Controllers\TransactionController::class, 'declineWithdraw'])->name('withdraw.decline')->middleware('user.type');
        Route::get('/pay_for_downline', [App\Http\Controllers\TransactionController::class, 'showInactiveDownlines'])->name('pay_for_downline');
        Route::post('/pay_for_downline', [App\Http\Controllers\TransactionController::class, 'payForDownline'])->name('downline.pay');
        Route::get('/settings', [App\Http\Controllers\TransactionController::class, 'settings'])->name('setting')->middleware('user.type');
        Route::post('/settings', [App\Http\Controllers\TransactionController::class, 'saveSettings'])->name('setting.save')->middleware('user.type');
    });
    
    Route::group(['prefix' => 'videos'], function(){
        Route::get('/', [App\Http\Controllers\VideoAndAdsController::class, 'index'])->name('video');
        Route::get('/list', [App\Http\Controllers\VideoAndAdsController::class, 'getList'])->name('video.list');
        Route::get('/upload', [App\Http\Controllers\VideoAndAdsController::class, 'show'])->name('video.show')->middleware('user.type');
        Route::post('/', [App\Http\Controllers\VideoAndAdsController::class, 'create'])->name('video.create')->middleware('user.type');
        Route::delete('/', [App\Http\Controllers\VideoAndAdsController::class, 'delete'])->name('video.delete')->middleware('user.type');
    });

    Route::group(['prefix' => 'video-users'], function(){
        Route::get('/', [App\Http\Controllers\VideoUsersController::class, 'checkUser'])->name('video.users.check');
        Route::post('/', [App\Http\Controllers\VideoUsersController::class, 'create'])->name('video.users.create');
    });

    Route::group(['prefix' => 'question-users'], function(){
        Route::get('/', [App\Http\Controllers\QuestionUserController::class, 'checkUser'])->name('question.user.check');
        Route::post('/', [App\Http\Controllers\QuestionUserController::class, 'create'])->name('question.user.create');
    });

    Route::group(['prefix' => 'questions'], function(){
        Route::get('/', [App\Http\Controllers\QuestionController::class, 'index'])->name('questions');
        Route::get('/create', [App\Http\Controllers\QuestionController::class, 'show'])->name('question.show')->middleware('user.type');
        Route::post('/create', [App\Http\Controllers\QuestionController::class, 'create'])->name('question.create')->middleware('user.type');
        Route::get('/list', [App\Http\Controllers\QuestionController::class, 'getList'])->name('question.list')->middleware('user.type');
        Route::get('/edit/{id}', [App\Http\Controllers\QuestionController::class, 'edit'])->name('question.edit')->middleware('user.type');
        Route::put('/edit', [App\Http\Controllers\QuestionController::class, 'update'])->name('question.update')->middleware('user.type');
        Route::delete('/delete', [App\Http\Controllers\QuestionController::class, 'delete'])->name('question.delete')->middleware('user.type');
        Route::post('/score', [App\Http\Controllers\QuestionController::class, 'addScore'])->name('question.score');
        Route::get('/participants', [App\Http\Controllers\QuestionController::class, 'getParticipants'])->name('question.participants')->middleware('user.type');
    });

    Route::group(['middleware' => 'user.type', 'prefix' => 'users'], function(){
        Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('users');
        Route::get('/{id}', [App\Http\Controllers\UserController::class, 'getUser'])->name('user.details');
        Route::post('/activate/{id}', [App\Http\Controllers\UserController::class, 'activateUser'])->name('user.activate');
        Route::post('/deactivate/{id}', [App\Http\Controllers\UserController::class, 'deactivateUser'])->name('user.deactivate');
        Route::delete('/delete/{id}', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('user.delete');
        Route::post('/profile/edit', [App\Http\Controllers\UserController::class, 'editProfile'])->name('profile.edit');
    });

    Route::group(['prefix' => 'profile'], function(){
        Route::get('/', [App\Http\Controllers\UserController::class, 'getProfile'])->name('profile');
        Route::post('/', [App\Http\Controllers\UserController::class, 'updateDetails'])->name('profile.update');
    });

    Route::group(['prefix' => 'revenues'], function(){
        Route::get('/', [App\Http\Controllers\RevenueController::class, 'index'])->name('revenue')->middleware('user.type');
        Route::post('/', [App\Http\Controllers\RevenueController::class, 'create'])->name('revenue.create');
        Route::post('/bulk', [App\Http\Controllers\RevenueController::class, 'createBulk'])->name('revenue.create.bulk');
    });

    Route::group(['prefix' => 'whatsapp_status'], function(){
        Route::get('/', [App\Http\Controllers\WhatsAppStatusController::class, 'index'])->name('whatsapp');
        Route::get('/add_status', [App\Http\Controllers\WhatsAppStatusController::class, 'show'])->name('whatsapp.show')->middleware('user.type');
        Route::post('/', [App\Http\Controllers\WhatsAppStatusController::class, 'create'])->name('whatsapp.create')->middleware('user.type');
        Route::get('/list', [App\Http\Controllers\WhatsAppStatusController::class, 'getList'])->name('whatsapp.list')->middleware('user.type');
        Route::get('/{id}', [App\Http\Controllers\WhatsAppStatusController::class, 'edit'])->name('whatsapp.edit')->middleware('user.type');
        Route::put('/', [App\Http\Controllers\WhatsAppStatusController::class, 'update'])->name('whatsapp.update')->middleware('user.type');
        Route::delete('/', [App\Http\Controllers\WhatsAppStatusController::class, 'delete'])->name('whatsapp.delete')->middleware('user.type');
    });

    Route::group(['prefix' => 'screenshots'], function(){
        Route::get('/', [App\Http\Controllers\ScreenshotController::class, 'index'])->name('screenshot')->middleware('upload.day');
        Route::post('/', [App\Http\Controllers\ScreenshotController::class, 'upload'])->name('screenshot.upload')->middleware('upload.day');
        Route::get('/list', [App\Http\Controllers\ScreenshotController::class, 'getScreenshots'])->name('screenshot.list');
        Route::get('/{id}', [App\Http\Controllers\ScreenshotController::class, 'getDetails'])->name('screenshot.details')->middleware('user.type');
        Route::post('/decline', [App\Http\Controllers\ScreenshotController::class, 'decline'])->name('screenshot.decline')->middleware('user.type');
    });

    Route::group(['prefix' => 'notifications'], function(){
        Route::get('/', [App\Http\Controllers\NotificationController::class, 'index'])->name('notify');
        Route::get('/send', [App\Http\Controllers\NotificationController::class, 'show'])->name('notify.show')->middleware('user.type');
        Route::post('/', [App\Http\Controllers\NotificationController::class, 'create'])->name('notify.create')->middleware('user.type');
    });
});
