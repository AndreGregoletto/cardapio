<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\CollaboratorController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::resource('collaborators', CollaboratorController::class)->parameters([
        'collaborators' => 'user'
    ])->except('show');

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);
});