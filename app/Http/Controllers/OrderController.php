<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $shop = Auth::user();
        $orders = $shop->api()->rest('GET', '/admin/orders.json', ['status' => 'closed', 'created_at_min' => "2019-01-01", 'limit' => 250])['body']['orders'];
//        echo '<pre>';
//        print_r($orders);
//        echo '</pre>';
        return view('orders', compact('orders'));
    }
}
