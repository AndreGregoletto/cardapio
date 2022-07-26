<?php

namespace App\Http\Controllers\Cardapio;

use App\Http\Requests\Menu\CheckoutRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Client;
use App\Models\Order;
use App\Models\TypePayment;

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

        $typePayments = TypePayment::isActive()->get();

        return view('cardapio.cart', ['products' => $products, 'typePayments' => $typePayments]);
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

        session()->put('cart', collect()->push([
            'total'    => $product->price,
            'id'       => $product->id,
            'product'  => $product,
            'quantity' => 1
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

        $data['date'] = now()->format('y-m-d');

        $order = Order::create($data);

        $order->products()->attach($products);

        $url = "https://wa.me/55{$client->cell}";

        $pedido = $order->products->pluck('name')->join(', ', ' e ');

        $text = "
            Um pedido feito com sucesso!

            Nome: {$client->name},
            Endereço: {$client->address->place}

            Pedido:
                {$pedido}

            Entrega: {$order->delivery}

            Total: R$ {$order->total}

        ";

        return redirect()->to($url.'?text='.urlencode($text));
    }

    protected function prepareProductsRelation()
    {
        if(session()->has('cart')) {
            $products = session()->get('cart');

            session()->forget('cart');

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
