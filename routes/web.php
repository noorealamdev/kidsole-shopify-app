<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//
////    $shop = Auth::user();
////    $domain = $shop->getDomain()->toNative();
////    $shopApi = $shop->api()->rest('GET', '/admin/shop.json')['body']['shop'];
////    echo("Shop {$domain}'s object:" . json_encode($shop));
////    echo("Shop {$domain}'s API objct:" . json_encode($shopApi));
////    return;
//
////    $shop = Auth::user();
////    $domain = $shop->getDomain()->toNative();
////    $shopApi = $shop->api()->rest('GET', '/admin/shop.json')['body']['shop'];
////    dd($shopApi);
//
////    $shop = Auth::user();
////    $request = $shop->api()->rest('GET', '/admin/shop.json');
////    // $request = $shop->api()->graph('{ shop { name } }');
////    dd($request['body']['shop']);
//
//
////    $shop = Auth::user();
////    $request = $shop->api()->rest('GET', '/admin/api/script_tags.json');
////    dd($request['body']);
//
////    $shop = Auth::user();
////    $request = $shop->api()->rest('POST', '/admin/api/script_tags.json', ['script_tag' => ['event' => "onload", 'src' => 'https://shopify.codemela.com/scripttags/app.js']]);
////    dd($request['body']);
//
//        $shop = Auth::user();
//        $request = $shop->api()->rest('PUT', '/admin/api/themes/138290757950/assets.json', ['asset' => ['key' => 'templates/akib.liquid', 'value' => '<h1>Hi, I am Rahat</h1>']]);
//        dd($request['body']);
//
//
//    //return view('welcome');
//})->middleware(['verify.shopify'])->name('home');


Route::middleware(['verify.shopify'])->group(function() {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('home');
    //Route::get('/', [\App\Http\Controllers\OrderController::class, 'index'])->name('home');
    Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('order');
    Route::get('/test', [\App\Http\Controllers\TestController::class, 'test'])->name('test');
});
