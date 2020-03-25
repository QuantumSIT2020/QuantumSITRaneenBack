<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Product_HotOffer extends Model
{
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
