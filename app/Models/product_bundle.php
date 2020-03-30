<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class product_bundle extends Model
{
    protected $fillable = ['bundle_product_id', 'product_id','bundle_id','created_at'];

    public function MainProduct(){
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public function BundleProduct(){
        return $this->belongsTo('App\Models\Product','bundle_product_id');
    }
}
