<?php

use App\Http\Controllers\Admin\CodesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LotteryController;
// use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\Web\CodesController as WebCodesController;
use App\Http\Controllers\Web\LandingController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => '/admin-panel',
    'as' => 'admin.'
], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::controller(CodesController::class)->group(function() {
        Route::get('/codes/lists', 'lists')->name('code.lists');
        Route::match(['get', 'post'], '/codes/generate', 'generate')->name('code.generate');
        Route::get('/view-code/{codeId}', 'show')->name('code.show');
    });
    Route::controller(LotteryController::class)->group(function() {
        Route::get('/lotteries/lists', 'lists')->name('lottery.lists');
        Route::match(['get', 'post'], '/lotteries/create', 'create')->name('lottery.create');
        Route::match(['get', 'post'], '/lotteries/update/{id}', 'update')->name('lottery.update');
        Route::get('/change-status/{id}', 'changeStatus')->name('lottery.change.status');
        Route::get('/delete/{id}', 'delete')->name('lottery.delete');
        Route::get('/lottery/applicants/{id}', 'applicants')->name('lottery.applicants');
    });
});

Route::group([
    'as' => 'web.'
], function() {
    Route::controller(WebCodesController::class)->group(function() {
        Route::get('/vp/{security_no?}', 'verify')->name('verify.product');
    });
    Route::controller(LandingController::class)->group(function() {
        Route::get('/', 'landing')->name('landing');
        Route::view('/#contact', 'web/pages/front')->name('contact');
        Route::post('/lottery/{id}/join', 'joinLottery')->name('applicant.join');
    });
});