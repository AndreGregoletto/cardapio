<?php

namespace App\Http\Controllers\Cardapio;

use App\Models\Product;
use App\Models\TypePayment;
use App\Http\Controllers\Controller;

class CartControler extends Controller
{
    public function index()
    {
        $products = collect();

        if(session()->has('cart')){
            $products = session()->get('cart');
        }

        $typePayments = TypePayment::isActive()->get();

        return view('cardapio.cart', ['products' => $products, 'typePayments' => $typePayments]);
    }

    public function store(Product $product)
    {
        if(session()->has('cart')) {

            $products = collect(session()->get('cart'));

            if($products->where('id', $product->id)->count()){

                $products = $products->map(function($item) use ($product) {

                    if($item['id'] == $product->id) {
                        $item['quantity'] += 1;
                        $item['total'] = $product->price * $item['quantity'];
                    }

                    return $item;
                });

            }else{
                $products->push([
                    'total'    => $product->price,
                    'id'       => $product->id,
                    'product'  => $product,
                    'quantity' => 1
                ]);

            }

            session()->put('cart', $products);

            return redirect()->route('menu.cart');
        }

        session()->put('cart', collect()->push([
            'total'    => $product->price,
            'id'       => $product->id,
            'product'  => $product,
            'quantity' => 1
        ]));

        return redirect()->route('menu.cart');

    }

    public function destroy($index)
    {
        $products = session()->get('cart');

        $products->splice($index, 1);

        session()->put('cart', $products);

        return back();
    }
}
