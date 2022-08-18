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
        // dd($request->all());
        $orders = Order::with('client', 'typePayment', 'products');

        $orders = $this->getFilter($orders, $request);

        $orders = $orders->get();

        $clients       = Client::get();
        $type_payments = TypePayment::get();

        return view('admin.report.index', ['orders'        => $orders,
                                           'clients'       => $clients,
                                           'type_payments' => $type_payments]);
    }

    protected function getFilter($orders, $request)
    {
        if(!empty($request->client)){
            $orders = $orders->where('client_id', $request->client);
        }

        if(!empty($request->type_payment)){
            $orders = $orders->where('type_payment_id', $request->type_payment);
        }

        if(!empty($request->date)){
            $data   = explode(" - ", str_replace("/", "-",$request->date));
            $period = $this->formatData($data);
            $orders = $orders->whereBetween('date', [$period['first'], $period['second']]);
        }

        return $orders;
    }

    public function formatData($period)
    {
        $aPeriod           = [];
        $aPeriod['first']  = date('Y-m-d', strtotime($period[0]));
        $aPeriod['second'] = date('Y-m-d', strtotime($period[1]));

        return $aPeriod;
    }
}