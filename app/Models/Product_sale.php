<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Product_sale extends Model
{
    public function products(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
