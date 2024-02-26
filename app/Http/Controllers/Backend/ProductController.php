<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return view('layouts.backend.admin-dashboard.product.index', compact('products'));
    }
    public function create(Request $request)
    {
        $products = Product::all();
        $categories = Category::all();
        return view('layouts.backend.admin-dashboard.product.create', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'images.*' => 'required|image|mimes:png,jpg,jpeg,svg', // Validate each uploaded image
            'price' => 'required|numeric',
            'weight' => 'required|string',
            'quantity' => 'required|numeric',
            'stock_quantity_available' => 'required|integer',
            'discount' => 'nullable|numeric'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->weight = $request->weight;
        $product->description = $request->description;
        $product->information = $request->information;
        $product->short_information = $request->short_information;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->slug = Str::slug($request->name);
        $product->discount = $request->discount;
        $product->quantity = $request->quantity;
        $product->stock_quantity_available = $request->stock_quantity_available;
        $product->category_name = $request->category_name;
        $product->save();

        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('product_images_test', 'public');
                $product->images()->create(['image_path' => $imagePath]);
            }
        }

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }
}
