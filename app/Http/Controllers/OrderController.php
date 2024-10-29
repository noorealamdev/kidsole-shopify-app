<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $shop = Auth::user();
        $orders = $shop->api()->rest('GET', '/admin/orders.json', ['status' => 'any', 'created_at_min' => "2020-01-01", 'limit' => 250])['body']['orders'];
        //dd($orders);
        return view('orders', compact('orders'));
    }
}
