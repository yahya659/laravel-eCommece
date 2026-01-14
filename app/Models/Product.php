<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // كل منتج ينتمي إلى قسم واحد
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
