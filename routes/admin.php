<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CollaboratorController;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TypePaymentController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::resource('collaborators', CollaboratorController::class)->parameters([
        'collaborators' => 'user'
    ])->except('show');

    Route::resource('configurations', ConfigurationController::class)->only('index', 'update');

    Route::resource('type-payments', TypePaymentController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);

    Route::resource('clients', ClientController::class);

    Route::resource('orders', OrderController::class);

    Route::get('reports', [ReportController::class, 'index'])->name('report');

    Route::get('excel', [ExcelController::class, 'export'])->name('excel');
});
