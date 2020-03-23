<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\WishList;

class Product extends Model
{
    public function WishList(){
        return $this->hasMany(WishList::class);
    }
    
    public function manufacturer(){
        return $this->belongsTo('App\Models\Manufacturer','manufacturer_id');
    }
    
    public function subcategory(){
        return $this->belongsTo('App\Models\SubCategory','sub_categories_id');
    }
}
