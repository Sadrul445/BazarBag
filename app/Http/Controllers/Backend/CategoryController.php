<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                $image_path = $file->storeAs('Category Image',$file->getClientOriginalName(),'public');

            }
            $category = Category::create(
                [
                    'name' => $request->name,
                    'description' => $request->description,
                    'image'=>$image_path,
                    'status' => $request->status,
                    'parent_category_id' => $request->parent_category_id,
                ]
                );
            session()->flash('create','Category Added Succesfully');
            return redirect()->route('category.index');
    }
    public function edit(Request $request,$id){
        $category = Category::findOrFail($id);
        return view('layouts.backend.admin-dashboard.category.edit',compact('category'));
    }
    public function update(Request $request,$id){
        $category = Category::findOrFail($id);

        $category->name = $request->input('name');
        $category->description = $request->input(('description'));

        if($request->hasFile('image')){
            Storage::delete($category->image);
        }
        $file = $request->file('image');
        
        $image_path = $file->storeAs('Category Image', $file->getClientOriginalName(),'public');

        $category->image = str_replace('public/','',$image_path);

        $category->status = $request->input('status');
        $category->parent_category_id = $request->input('parent_category_id');

        $category->save();
        session()->flash('update', 'Category Updated Successfully');
        return redirect()->route('category.index');
    }
    public function destroy(Request $request,$id){
        $category = Category::findOrFail($id);
        $category->delete();
        session()->flash('delete', 'Category Deleted Successfully');
        return redirect()->route('category.index'); 
    }
}
