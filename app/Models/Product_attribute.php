<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Attributes;

class Product_attribute extends Model
{
    public function Product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }


    public function Attributes(){
        return $this->belongsTo('App\Models\Attributes','attribute_id');
    }
}
