<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // public function shop_grid_index(){
    //     return view('layouts.frontend.shop.shop-grid');
    // }

    
    public function shop_details(Request $request,$id){
        $single_product = Product::find($id); //showing single product show
        return view('layouts.frontend.shop.shop-details',compact('single_product'));
    }
    public function shops(Request $request){
        $products = Product::all(); // showing all products
        return view('layouts.frontend.shop.shop-grid',compact('products'));
    }
    public function addToCart(Request $request, $id){
        
        $product = Product::findOrFail($id);

        $cart = session()->get('cart',[]);
        
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }
        else{
            $cart[$id]=[
                'name' => $product->name,
                'description' => $product->description,
                'brand_id' =>$product->brand_id, 
                'image'=>$product->image,
                'price'=> $product->price,
                'status' => $product->status,
                'slug'=>$product->slug,
                'discount' => $product->discount,
                'quantity' => $product->quantity,
                'stock_quantity_available' => $product->stock_quantity_available,
                'category_name' => $product->category_name,
            ];
        }

        session()->put('cart',$cart);
        return redirect()->back()->with('success',"<strong>{$product->name}</strong> added to cart successfully");
    }
}
