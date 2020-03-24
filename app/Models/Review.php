<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\User;

class Review extends Model
{
    public function Product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public function User(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
