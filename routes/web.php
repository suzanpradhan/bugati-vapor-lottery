<?php

use App\Http\Controllers\Admin\CodesController;
use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\Web\CodesController as WebCodesController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => '/admin-pannel',
    'as' => 'admin.'
], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::controller(CodesController::class)->group(function() {
        Route::get('/codes/lists', 'lists')->name('code.lists');
        Route::match(['get', 'post'], '/codes/generate', 'generate')->name('code.generate');
        Route::get('/view-code/{codeId}', 'show')->name('code.show');
    });
});

Route::group([
    'as' => 'web.'
], function() {
    // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::controller(WebCodesController::class)->group(function() {
        Route::get('/verify-product/{security_no?}', 'verify')->name('verify.product');
    });
});

// Route::controller(QRCodeController::class)->group(function() {
//     Route::get('qrcode', 'index');
// });
