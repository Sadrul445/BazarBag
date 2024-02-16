<?php

namespace App\Http\Controllers\Backend;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $products = Product::all();
        return view('layouts.backend.admin-dashboard.product.index',compact('products'));
    }
    public function create(Request $request){
        $products = Product::all();
        $categories = Category::all();
        return view('layouts.backend.admin-dashboard.product.create',compact('products','categories'));
    }
    
    public function store(Request $request)
    {
        // $product = Product::find($id);
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
            'price' => 'required|numeric',
            'quantity'=>'required|numeric',
            'stock_quantity_available' => 'required|integer',
            'discount' => 'nullable|numeric'
        ]);
        $image_path = null;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_path = $file->storeAs('Product Image',$file->getClientOriginalName(),'public');
        }
        $product = Product::create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'brand_id' =>$request->brand_id, 
                'image'=>$image_path,
                'price'=> $request->price,
                'status' => $request->status,
                'slug'=>$request->slug,
                'discount' => $request->discount,
                'quantity' => $request->quantity,
                'stock_quantity_available' => $request->stock_quantity_available,
                'category_name' => $request->category_name,
            ]
            );
            $product->save();
        return redirect()->route('product.index',compact('product'))->with('success', 'Product created successfully.');
    }
}
