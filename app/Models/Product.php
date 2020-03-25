<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\WishList;
use App\Models\SubCategory;
use App\Models\Manufacturer;
use App\Models\Product_sale;

class Product extends Model
{
    public function WishList(){
        return $this->hasMany(WishList::class);
    }



    public function SubCategory(){
        return $this->belongsTo('App\Models\SubCategory','sub_categories_id');
    }


    public function Manufacturer(){
        return $this->belongsTo('App\Models\Manufacturer','manufacturer_id');
    }





}
