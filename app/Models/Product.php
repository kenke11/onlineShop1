<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Product extends Model
{
    use HasFactory;

    public function product_images(){
        return $this->hasMany('App\Product_images');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category', 'cat_id');
    }

    public function subcategory() {
        return $this->belongsTo('App\Models\Subcategory', 'subcat_id');
    }



}
