<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Attributes;

class Product_attribute extends Model
{
<<<<<<< HEAD
    public function Product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }


    public function Attributes(){
=======
    public function attribute(){
>>>>>>> 7743d011ec326004a07f7d154d0162f0c912ff61
        return $this->belongsTo('App\Models\Attributes','attribute_id');
    }
}
