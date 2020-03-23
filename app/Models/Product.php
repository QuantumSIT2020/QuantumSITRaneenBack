<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\WishList;

class Product extends Model
{
    public function WishList(){
        return $this->hasMany(WishList::class);
    }
}
