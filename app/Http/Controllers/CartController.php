<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use App\Models\Admin\Product;

class CartController extends Controller
{
    // Add to cart 
    public function addtocart($id){

        $product = Product::find($id);

        if ($product->photo) {
            $photo = asset('uploads/product').'/'.$product->photo;
        }else{
            $photo = 'https://via.placeholder.com/400x400.png';
        }
        

        \Cart::add(array(
            'id' => $product->id, // inique row ID
            'name' => $product->name,
            'price' => get_discount_price($product->id),
            'quantity' => 1,
            'attributes' => array(
                'photo' => $photo,
            )
        ));

        return redirect()->route('getCarts');
    }


    public function getcarts(){
        $models = \Cart::getContent();
        return view('frontend.cart',compact('models'));
    }

    public function delete($id){
        $models = \Cart::remove($id);
        return redirect()->back()->with('message','Item has been removed');
    }

    public function clearAllCart(){
        \Cart::clear();
        return redirect()->back()->with('message','Clear All Cart Item successfully');
    }

    public function checkout(){
        $models = \Cart::getContent();
        return view('frontend.checkout',compact('models'));
    }
}
