<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Facades\Storage; 

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::all();
        return view('brand.index', compact('brands'));
    }

    public function create()
    {
        return view('brand.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        //validating
        $request->validate([
            'name' => 'required | min:2',
            'photo' => 'required | mimes:jpeg,jpg,png',
        ]);
        //checking file 
        if ($request->file()) {
            $fileName = time() . '_' . $request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('brand', $fileName, 'public');
            $path = '/storage/' . $filePath;
        }
        //store
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->photo = $path;
        $brand->save();

        return redirect()->route("brand.index");
    }

    public function show($id)
    {
        $brand = Brand::find($id);
        return view('brand.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            "name" => "required|min:2",
            "photo" => "sometimes|required|mimes:jpeg,bmp,png",
            "oldphoto" => "required"
        ]);
        // dd($request->oldphoto);

        // if include file, upload
        if ($request->file()) {
            
            // delete old photo
            unlink(public_path($request->oldphoto));
            $fileName = time() . '_' . $request->photo->getClientOriginalName();

            $filePath = $request->file('photo')->storeAs('brand', $fileName, 'public');

            $path = '/storage/' . $filePath;
        } else {
            $path = $request->oldphoto;
        }

        // update
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->photo = $path;
        $brand->save();

        // redirect
        return redirect()->route('brand.index');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        unlink(public_path($brand->photo));
        $brand->delete();

        return redirect()->route('brand.index');
    }
}
