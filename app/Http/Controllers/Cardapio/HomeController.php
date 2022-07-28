<?php

namespace App\Http\Controllers\Cardapio;

use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')
        ->has('products')
        ->isActive()
        ->get();

        return view('cardapio.index', ['categories' => $categories]);
    }
}
