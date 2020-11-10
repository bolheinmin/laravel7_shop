<?php

use Illuminate\Support\Facades\Route;

//frontend-asset
// Route::get('/', 'MainController@index')->name('homepage');
// Route::get('testing', 'MainController@testing')->name('testingpage');
// Route::get('about', 'MainController@about')->name('aboutpage');
// Route::get('contact', 'MainController@contact')->name('contactpage');


Route::middleware('role:admin')->group(function(){
    //CRUD BACKEND
    Route::resource('brand', 'BrandController');
    Route::resource('category', 'CategoryController');
    Route::resource('subcategory', 'SubCategoryController');
    Route::resource('item', 'ItemController');
});



//frontend-asset
Route::get('/', 'FrontendController@index')->name('homepage');
Route::get('/user_login', 'FrontendController@login')->name('loginpage');
Route::get('/user_register', 'FrontendController@register')->name('registerpage');
Route::get('/item_detail/{id}', 'FrontendController@itemDetail')->name('itemdetail');
Route::get('itemsBySubCategory/{id}', 'FrontendController@itemsBySubCategory')->name('itemsBySubCategory');

Route::get('cart', 'FrontendController@cart')->name('cartpage');
Route::get('order_success','FrontendController@success');

//user-controller
Route::resource('user', 'UserController');

//auth
Auth::routes();

//order
Route::resource('order', 'OrderController');
Route::get('order/{id}/confirm','OrderController@confirm');
Route::get('order/{id}/cancle','OrderController@cancle');

