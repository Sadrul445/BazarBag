<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
        return view('layouts.backend.admin-dashboard.category.index',compact('categories'));
    }
    public function create(Request $request){
        $categories = Category::all();
        return view('layouts.backend.admin-dashboard.category.create',compact('categories'));
    }
    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required|string',
                'image' => 'required|image|mimes:png,jpg,jpeg,svg'
            ]
            );
            $image_path = null;

            if($request->hasFile('image')){
                $file = $request->file('image');
                $image_path = $file->storeAs('Created_Category_Image',$file->getClientOriginalName(),'public');
            }
            $category = Category::create(
                [
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'image'=>$image_path,
                    'status' => $request->status,
                ]
                );
            session()->flash('create','Category Added Succesfully');
            return redirect()->route('category.index');



    }
    // public function edit(){

    // }
    // public function update(){

    // }
    // public function delete(){

    // }
}
