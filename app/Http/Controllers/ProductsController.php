<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    public function index() {
        $data = asset('storage/data.json');
        $products = Http::get($data)->json();
        return view('products.index', compact('products'));
    }
}
