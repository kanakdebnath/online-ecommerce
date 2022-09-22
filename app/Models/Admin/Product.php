<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function sub_category(){
        return $this->belongsTo(SubCategory::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
