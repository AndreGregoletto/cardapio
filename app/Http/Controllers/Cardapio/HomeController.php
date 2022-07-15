<?php

namespace App\Http\Controllers\Cardapio;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function cart()
    {
        $products = [];

        if(session()->has('cart')){
            $products = session()->get('cart');
        }

        dd($products);
    }

    public function addCart(Product $product)
    {
        if(session()->has('cart')) {
            $products = collect(session()->get('cart'));

            if($products->where('id', $product->id)->count()){
                $products->where('id', $product->id)->first()->quantity += 1;
            }else{
                // $products->push([
                //     'id'       => $product->id,
                //     'quantity' => 1 + 1
                // ]);
            }

            return redirect()->route('menu.cart');
        }

        session()->put('cart', [
            'id'       => $product->id,
            'quantity' => 1
        ]);

        return redirect()->route('menu.cart');

    }
}
