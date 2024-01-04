<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // public function shop_grid_index(){
    //     return view('layouts.frontend.shop.shop-grid');
    // }

    
    public function shop_details(Request $request,$id){
        $single_product = Shop::find($id); //showing single product show
        return view('layouts.frontend.shop.shop-details',compact('single_product'));
    }
    public function shops(Request $request){
        $shopProducts = Shop::all(); // showing all products
        return view('layouts.frontend.shop.shop-grid',compact('shopProducts'));
    }
    public function addToCart(Request $request, $id){
        return redirect()->back()->with('success','Product add to cart successfully');
    }
}
