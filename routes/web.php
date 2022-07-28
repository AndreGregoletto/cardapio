<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login')->name('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';

require __DIR__.'/menu.php';
