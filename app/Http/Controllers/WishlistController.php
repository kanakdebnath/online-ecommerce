<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // wishlist 
public function wishlist(){

    if(Auth::check()){
        $models = Wishlist::where('user_id',Auth::user()->id)->with('product')->get();
        return view('frontend.wishlist',compact('models'));
    }else{
        return redirect()->route('login')->with('warning','Login First');
    }
}


    // wishlist 
    public function store($id){
        $model = new Wishlist();

        $model->user_id = Auth::user()->id;
        $model->product_id = $id;

        $model->save();

        return redirect()->route('wishlist')->with('message', 'Product Added In wishlist');
    }


}
