<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){
        return view('home');
    }    
    public function nav_category(Request $request){
        $products = Product::all();
        $categories = Category::all(); // Fetch all categories from the database
        return view('home', compact('categories','products'));
    }
}
