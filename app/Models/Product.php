<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\WishList;
use App\Models\SubCategory;
use App\Models\Manufacturer;

class Product extends Model
{
    public function WishList(){
        return $this->hasMany(WishList::class);
    }
<<<<<<< HEAD


    public function SubCategory(){
        return $this->belongsTo('App\Models\SubCategory','sub_categories_id');
    }


    public function Manufacturer(){
        return $this->belongsTo('App\Models\Manufacturer','manufacturer_id');
    }

=======
    
    public function manufacturer(){
        return $this->belongsTo('App\Models\Manufacturer','manufacturer_id');
    }
    
    public function subcategory(){
        return $this->belongsTo('App\Models\SubCategory','sub_categories_id');
    }
>>>>>>> 7743d011ec326004a07f7d154d0162f0c912ff61
}
