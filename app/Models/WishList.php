<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Product;


class WishList extends Model

{
    protected $table = "wish_lists";

    protected $fillable=['product_id','customer_id'];

    public function Customer(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }

    public function Product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
