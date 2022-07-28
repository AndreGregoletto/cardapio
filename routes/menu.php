<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cardapio\CartControler;
use App\Http\Controllers\Cardapio\HomeController;
use App\Http\Controllers\Cardapio\OrderControler;

Route::group(['as' => 'menu.'], function() {
    Route::get('cart/remove/{index}', [CartControler::class, 'destroy'])->name('cart.remove');

    Route::post('cart/checkout', [OrderControler::class, 'store'])->name('cart.checkout');

    Route::get('cart/add/{product}', [CartControler::class, 'store'])->name('cart.add');

    Route::get('cart', [CartControler::class, 'index'])->name('cart');

    Route::get('/', [HomeController::class, 'index'])->name('home');
});
