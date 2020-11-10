<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | min:2',
            'photo' => 'required | mimes:jpeg,png,jpg',
        ]);

        if($request->file())
        {
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('category',$fileName,'public');
            $path = '/storage/'.$filePath;
        }

        $category = new Category();
        $category->name = $request->name;
        $category->photo = $path;
        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required | min:2',
            'photo' => 'sometimes | required | mimes:jpeg,jpg,png',
            'oldphoto' => 'required'
        ]);

        if($request->file())
        {
            unlink(public_path($request->oldphoto));
            $fileName = time().'_'.$request->file('photo')->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('category',$fileName,'public');
            $path = '/storage/'.$filePath;
        }
        else
        {
            $path = $request->oldphoto;
        }
        
        $category->name = $request->name;
        $category->photo = $path;
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        unlink(public_path($category->photo));
        return redirect()->route('category.index');
    }
}
