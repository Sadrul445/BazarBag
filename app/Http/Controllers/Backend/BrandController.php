<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request){
        $brands = Brand::all();
        return view('layouts.backend.admin-dashboard.brand.index',compact('brands'));
    }
    public function create(Request $request){
        $brands = Brand::all();
        return view('layouts.backend.admin-dashboard.brand.create',compact('brands'));
    }
}
