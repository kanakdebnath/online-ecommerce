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

Route::get('/home', 'HomeController@index');

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


    
    // For Product Route 
    Route::get('product/delete/{id}','ProductController@delete')->name('product.delete');
    Route::resource('product','ProductController');
    // For Product Route 

});
