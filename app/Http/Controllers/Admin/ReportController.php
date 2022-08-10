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
        $orders        = Order::with('client', 'typePayment', 'products');
        $clients       = Client::get();
        $type_payments = TypePayment::get();

        $data = $this->getFilter($orders, $request);

        return view('admin.report.index', ['orders' => $orders,
                                           'clients' => $clients,
                                           'type_payments' => $type_payments]);
    }

    public function getFilter($modelOrders, $filters)
    {
        // dd($filters->client, $filters->type_payment);
        $query = '';

        if(!empty($filters->client)){
            dd('true');
        }else{
            dd('false');
        }

        if(!empty($filters->type_payment)){
            dd('true');
        }else{
            dd('false');
        }
    }
}
