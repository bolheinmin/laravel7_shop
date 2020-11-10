<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Brand;
use App\Category;
use App\SubCategory;

class FrontendController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('frontend.mainpage', compact('items'));
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function register()
    {
        return view('frontend.register');
    }
    public function itemDetail($id)
    {
        $brands = Brand::all();
        $subcategories = SubCategory::all();
        $item = Item::find($id);
        return view('frontend.item_detail', compact('item', 'brands', 'subcategories'));
    }

    public function itemsBySubCategory($id)
    {
        $subcategory = SubCategory::find($id);
        $categories = Category::all();
        return view('frontend.itemsBySubCategory', compact('subcategory'));
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function success()
    {
        return view('order.accept');
    }
}
