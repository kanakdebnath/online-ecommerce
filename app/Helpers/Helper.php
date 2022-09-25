<?php

use App\Models\Admin\Product;

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

?>