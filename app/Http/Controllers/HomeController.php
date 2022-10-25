<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if (Auth::user()) {

            if (Auth::user()->user_type == 'admin') {
                return view('admin.dashboard');
            }else if (Auth::user()->user_type == 'user') {
                return view('frontend.dashboard');
            }else{
                return redirect()->route('login');
            }
           
        }else{
            return redirect()->route('login');
        }
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }


// Product details code 

public function product_details($id){
    $product = Product::findOrFail($id);

    $reletade_product = Product::where('category_id',$product->category_id)
                        ->where('status','active')
                        ->latest()->take(4)
                        ->get();

    return view('frontend.product-details',compact('product','reletade_product'));
}
// Product details code 


// Dashboard 
public function dashboard(){

    if(Auth::check()){
        return view('frontend.dashboard');
    }else{
        return redirect()->route('login');
    }
}

// wishlist 
public function wishlist(){

    if(Auth::check()){
        return view('frontend.wishlist');
    }else{
        return redirect()->route('login');
    }
}

// cart 
public function cart(){

    if(Auth::check()){
        return view('frontend.cart');
    }else{
        return redirect()->route('login');
    }
}



}
