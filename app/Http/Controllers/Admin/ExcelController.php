<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrdersExposrt;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function export()
    {
        return Excel::download(new OrdersExposrt, 'orders.xlsx');
    }
}
