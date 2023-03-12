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
    });
});

Route::group([
    'as' => 'web.'
], function() {
    Route::get('/', [LandingController::class, 'landing'])->name('landing');
    Route::controller(WebCodesController::class)->group(function() {
        Route::get('/vp/{security_no?}', 'verify')->name('verify.product');
    });
});