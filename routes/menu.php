<?php

use App\Http\Controllers\Cardapio\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'menu.'], function() {
    Route::get('cart', [HomeController::class, 'cart'])->name('cart');

    Route::get('cart/add/{product}', [HomeController::class, 'addCart'])->name('cart.add');
    Route::get('cart/remove/{index}', [HomeController::class, 'removeCart'])->name('cart.remove');
});
