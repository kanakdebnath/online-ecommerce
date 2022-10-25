<?php

use App\Models\Wishlist;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\DB;

if (!function_exists('make_slug')) {
    function make_slug($urlString){
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
        return $slug;
    }
}


if (!function_exists('category_count')) {
    function category_count($data){
        $product = Product::where('category_id',$data)->count();
        return $product;
    }
}


if (!function_exists('wishlist_count')) {
    function wishlist_count($data){
        $Wishlist = Wishlist::where('user_id',$data)->count();
        return $Wishlist;
        
    }
}



if (!function_exists('get_setting_data')) {
    function get_setting_data($data){
        $setting = DB::table('settings')->where('name',$data)->get();
        if(!$setting->isEmpty()){
            return $setting[0]->value;
        }else{
            return '';
        }
    }
}


if (!function_exists('get_discount_price')) {
    function get_discount_price($id){
        $product = Product::findOrFail($id);

        if ($product->discount > 0) {
            $price = $product->price;
            $discount = $product->discount;
            if ($product->discount_type == 'flat') {
                $price = $price - $discount;
            }else{
                $price = $price - (($discount*100)/$price);
            }
            return round($price,2);
        }else{
            return $product->price;
        }
    }
}

?>