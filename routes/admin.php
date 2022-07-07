<?php

use App\Http\Controllers\Admin\CollaboratorController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::resource('collaborators', CollaboratorController::class)->parameters([
        'collaborators' => 'user'
    ])->except('show');
});