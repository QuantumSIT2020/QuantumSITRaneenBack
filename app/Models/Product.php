<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\WishList;
use App\Models\SubCategory;
use App\Models\Manufacturer;
use App\Models\Product_sale;
use App\Models\Review;
use Auth;

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

    public static function getReview($id)
    {
        return Review::where('product_id',$id)->avg('reviews');
    }

    public static function checkDiscount($id)
    {
        return Product_sale::where('product_id',$id)->orderBy('id','desc')->get()->first();
    }

    public function checkWishList()
    {
        return WishList::where('product_id',$this->id)->where('user_id',Auth::user()->id)->count();
    }

    public static function wishLists()
    {
        if(isset(Auth::user()->id)){
            return WishList::where('user_id',Auth::user()->id)->count();
        }else{
            return 0;
        }
    }


}
