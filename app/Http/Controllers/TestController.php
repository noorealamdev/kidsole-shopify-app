<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function test()
    {
        $shop = Auth::user();
        $domain = $shop->getDomain()->toNative();
        $shopApi = $shop->api()->rest('GET', '/admin/shop.json')['body']['shop'];

        //dd(json_encode($shopApi));

        return view('test');
    }

}
