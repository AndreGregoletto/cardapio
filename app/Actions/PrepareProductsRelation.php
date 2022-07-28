<?php

namespace App\Actions;

class PrepareProductsRelation
{
    public function handle()
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