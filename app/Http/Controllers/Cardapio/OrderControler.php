<?php

namespace App\Http\Controllers\Cardapio;

use App\Actions\GenerateMessageWhatsapp;
use App\Actions\PrepareProductsRelation;
use Exception;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CheckoutRequest;

class OrderControler extends Controller
{
    public function store(
        CheckoutRequest $request, 
        PrepareProductsRelation $prepareProductsRelation, 
        GenerateMessageWhatsapp $generateMessageWhatsapp
    )
    
    {
        $data = $request->validated();
        DB::beginTransaction();

        try {
            $products = $prepareProductsRelation->handle();
    
            $client = Client::create($data);
    
            if($data['zipcode']) { 
                $client->address()->create($data);
            }

            $order = $client->orders()->create($data);
    
            $order->products()->attach($products);
    
            $redirectWhatsapp = $generateMessageWhatsapp->handle($order, $client);

            session()->forget('cart');

            DB::commit();

            return $redirectWhatsapp;

        } catch(Exception $exception){
            DB::rollBack();
            throw new Exception('Erro ao finalizar o pedido', $exception->getCode());
        }
    }
}
