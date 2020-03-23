<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_attribute extends Model
{
    public function attribute(){
        return $this->belongsTo('App\Models\Attributes','attribute_id');
    }
}
