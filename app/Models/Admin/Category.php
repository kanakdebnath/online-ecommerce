<?php

namespace App\Models\Admin;

use App\Models\Admin\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function sub_category()
        {
            return $this->hasMany(SubCategory::class);
        }
}
