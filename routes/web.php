<?php

use App\Http\Controllers\Admin\CodesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\QRCodeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => '/admin-pannel',
    'as' => 'admin.'
], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::controller(CodesController::class)->group(function() {
        Route::get('/codes/lists', 'lists')->name('code.lists');
        Route::match(['get', 'post'], '/codes/generate', 'generate')->name('code.generate');
    });
});



Route::controller(QRCodeController::class)->group(function() {
    Route::get('qrcode', 'index');
});
