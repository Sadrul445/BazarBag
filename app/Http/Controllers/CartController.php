<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('layouts.frontend.cart.index');
    }
    
    public function removeItem(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
    
            if (isset($cart[$request->id])) {
               
                unset($cart[$request->id]);  // Remove the specific item from the cart
    
                session()->put('cart', $cart);  // Update the session with the modified cart

                return redirect()->back()->with('success', 'Product removed successfully');
            } else {     
                return redirect()->back()->with('error', 'Product not found in the cart');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid request');
        }
    }
    public function updateItem(Request $request){
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
    
            if(isset($cart[$request->id])){
                $cart[$request->id]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Cart successfully updated');
                return response()->json(['success' => true, 'message' => 'Cart successfully updated']);
            } else {
                return response()->json(['success' => false, 'message' => 'Product not found in the cart']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid request']);
        }
    }

}
