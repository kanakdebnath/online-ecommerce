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
        $user_id = Auth::user()->id;
        if(Wishlist::where('product_id',$id)->where('user_id',$user_id)->count() > 0){
            return redirect()->back()->with('warning', 'Product Already Added In wishlist');
        }else{
            $model = new Wishlist();
            $model->user_id = $user_id;
            $model->product_id = $id;
            $model->save();

            return redirect()->route('wishlist')->with('message', 'Product Added In wishlist');
           
        }
    }


}
