<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return view('frontend.index');
});

Route::get('logout','HomeController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index2')->name('home2');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['admin','auth']],function(){

    Route::post('get_sub_categories','CategoryController@get_sub_categories')->name('get_sub_categories');
    Route::get('category/delete/{id}','CategoryController@delete')->name('category.delete');
    Route::resource('category','CategoryController');


    // For Subcategory Route 
    Route::get('sub-category/delete/{id}','SubCategoryController@delete')->name('sub-category.delete');
    Route::resource('sub-category','SubCategoryController');
    // For Subcategory Route 


    

    // For Order Route 
    Route::get('order/index','OrderController@index')->name('order.index');
    Route::get('order/delete/{id}','OrderController@delete')->name('order.delete');
    // For Order Route 


    
    // For Product Route 
    Route::get('product/delete/{id}','ProductController@delete')->name('product.delete');
    Route::resource('product','ProductController');
    // For Product Route 

     // For User Route 
     Route::get('user/index','UserController@index')->name('user.index');
     Route::get('user/create','UserController@create')->name('user.create');
     Route::post('user/store','UserController@store')->name('user.store');
     Route::patch('user/update/{id}','UserController@update')->name('user.update');
     Route::get('user/edit/{id}','UserController@edit')->name('user.edit');
     Route::get('user/delete/{id}','UserController@delete')->name('user.delete');
     // For user Route 


      // For Settings Route 
      Route::get('setting/general','SettingController@general')->name('setting.general');
      Route::get('setting/logo','SettingController@logo')->name('setting.logo');
      Route::post('setting/store','SettingController@store')->name('setting.store');
      Route::post('setting/store_logo','SettingController@store_logo')->name('setting.store_logo');
      
      // For Settings Route 

});



Route::get('category-shop/{id}','HomeController@category_shop')->name('category-shop');
Route::get('shop','HomeController@shop')->name('shop');

Route::get('product-details/{id}','HomeController@product_details')->name('product-details');
Route::post('/QuickViewModal', 'HomeController@QuickViewModal')->name('QuickViewModal');


Route::group(['middleware'=>'auth'],function(){

    Route::get('dashboard','HomeController@dashboard')->name('dashboard');


    // Wishlist 
    Route::get('wishlist','WishlistController@wishlist')->name('wishlist');
    Route::get('wishlist/store/{id}','WishlistController@store')->name('wishlist.store');

});

//bKash
Route::post('/bkash/createpayment', 'Admin\BkashController@checkout')->name('bkash.checkout');
Route::post('/bkash/executepayment', 'Admin\BkashController@excecute')->name('bkash.excecute');
Route::get('/bkash/success', 'Admin\BkashController@success')->name('bkash.success');


Route::get('cart/clear','CartController@clearAllCart')->name('clearAllCart');
Route::get('cart/delete/{id}','CartController@delete')->name('cart.delete');
Route::get('addtocart/{id}','CartController@addtocart')->name('addToCart');
Route::get('carts','CartController@getcarts')->name('getCarts');
Route::get('checkout','CartController@checkout')->name('checkout');
Route::post('order_submit','Admin\CheckoutController@order_submit')->name('order_submit');

