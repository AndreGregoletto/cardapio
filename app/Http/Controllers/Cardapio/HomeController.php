<?php

namespace App\Http\Controllers\Cardapio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('cardapio.index');
    }
}
