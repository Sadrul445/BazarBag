<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop_grid_index(){
        return view('layouts.frontend.shop.shop-grid');
    }
    public function shop_details(){
        return view('layouts.frontend.shop.shop-details');
    }
}
