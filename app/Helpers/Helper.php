<?php

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

?>