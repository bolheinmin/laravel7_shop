<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Category;
use Exception;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::all();
        return view('subcategory.index',compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('subcategory.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:2",
        ]);
        
            $subCategory = new SubCategory();
            //inserting
            $subCategory = new SubCategory();
            $subCategory->name = $request->name;
            $subCategory->category_id = $request->category;
            $subCategory->save();
            //redirect
            return redirect()->route('subcategory.index');
    }

    public function show(SubCategory $subCategory, $id)
    {
        $subCategory = SubCategory::find($id);
        $categories = Category::all();
        return view('subcategory.show',compact('subCategory','categories'));
    }

    public function edit(SubCategory $subCategory, $id)
    {
        $subCategory = SubCategory::find($id);
        $categories = Category::all();
        return view('subcategory.edit',compact('subCategory','categories'));
    }

    public function update(Request $request, SubCategory $subCategory, $id)
    {
        $request->validate([
            "name" => "required|min:2",
        ]);
        $subCategory = SubCategory::find($id);
        
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category;
        $subCategory->save();

        return redirect()->route('subcategory.index');
    }

    public function destroy(SubCategory $subCategory, $id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        return redirect()->route('subcategory.index');
    }
}
