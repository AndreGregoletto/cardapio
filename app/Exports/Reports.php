<?php

namespace App\Exports;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class Reports implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(Request $request)
    {
        return Request::all();
    }
}
