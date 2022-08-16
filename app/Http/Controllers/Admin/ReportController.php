<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Client;
use App\Models\TypePayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        dd($request->all());
        $orders = Order::with('client', 'typePayment', 'products');

        $orders = $this->getFilter($orders, $request);

        $orders = $orders->get();

        $clients       = Client::get();
        $type_payments = TypePayment::get();

        return view('admin.report.index', ['orders'        => $orders,
                                           'clients'       => $clients,
                                           'type_payments' => $type_payments]);
    }

    public function getFilter($orders, $request)
    {
        if(!empty($request->client)){
            $orders = $orders->where('client_id', $request->client);
        }

        if(!empty($request->type_payment)){
            $orders = $orders->where('type_payment_id', $request->type_payment);
        }

        if(!empty($request->date)){

        }

        return $orders;
    }
}

// dentro do if fazer um explode para quebrar o valor dela em duas a partir do ifem, gerando dos indices [0] [1]