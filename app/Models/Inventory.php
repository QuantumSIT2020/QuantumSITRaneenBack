<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    
    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory','sub_categories_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo('App\Models\Manufacturer','manufacturer_id');
    }
}
