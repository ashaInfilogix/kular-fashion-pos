<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangePriceReasonController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('/');
    Route::get('/get-products', [ProductController::class, 'getProducts'])->name('get.products');
});

Route::get('/validate-item/{barcode}', [ProductController::class, 'productValidate']);
Route::get('/change-price-reasons', [ChangePriceReasonController::class, 'index']);
Route::get('/test-print', [PrinterController::class, 'printTestReceipt']);