<?php

namespace App\Http\Controllers\Cardapio;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CheckoutRequest;
use App\Models\Client;
use App\Models\Order;

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
        // session()->forget('cart');
        // session()->save();

        $products = collect();

        if(session()->has('cart')){
            $products = session()->get('cart');
        }

        return view('cardapio.cart', ['products' => $products]);
    }

    public function addCart(Product $product)
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

        session()->put('cart', collect([
            [
                'total'    => $product->price,
                'id'       => $product->id,
                'product'  => $product,
                'quantity' => 1
            ]
        ]));

        return redirect()->route('menu.cart');

    }

    public function removeCart($index)
    {
        $products = session()->get('cart');

        $products->splice($index, 1);

        session()->put('cart', $products);

        return back();
    }

    public function checkout(CheckoutRequest $request)
    {
        $data = $request->validated();

        $products = $this->prepareProductsRelation();

        $client = Client::create($data);

        $client->address()->create($data);

        $data['client_id'] = $client->id;

        $data['type_payment_id'] = 1;

        $data['date'] = now()->format('y-m-d');

        $order = Order::create($data);

        $order->products()->attach($products);

        dd($order->load('products'));
    }

    protected function prepareProductsRelation()
    {
        if(session()->has('cart')) {
            $products = session()->get('cart');

            return $products->keyBy(function($product) {
                return $product['product']->id;
            })->map(function($product) {
                return [
                    'quantity' => $product['quantity']
                ];
            });
        }

        return [];
    }

}
