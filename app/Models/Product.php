<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\WishList;
use App\Models\SubCategory;
use App\Models\Manufacturer;
use App\Models\Product_sale;
use App\Models\Review;
use App\Models\Product_Gallery;
use App\Models\ChildCategory;
use App\Models\MainCategory;
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
        if (isset(Auth::user()->id)) {
            return WishList::where('product_id',$this->id)->where('user_id',Auth::user()->id)->count();
        }else{
            return 0;
        }
    }

    public static function wishLists()
    {
        if(isset(Auth::user()->id)){
            return WishList::where('user_id',Auth::user()->id)->count();
        }else{
            return 0;
        }
    }

    public function getGalleryImages()
    {
        return Product_Gallery::where('product_id',$this->id)->get();
    }
    
    public function getChildCategory($id)
    {
        return ChildCategory::where('id',$id)->get()->first();
    }

    public function getMainCategory($id)
    {
        $sub = SubCategory::where('id',$id)->get()->first();
        $child = ChildCategory::where('id',$sub->child_category_id)->get()->first();
        return MainCategory::where('id',$child->main_category_id)->get()->first();
    }

    public static function calculateRemainTime($start,$end)
    {
        // Declare and define two dates 
        $date1 = strtotime($start);  
        $date2 = strtotime($end);  
        
        // Formulate the Difference between two dates 
        $diff = abs($date2 - $date1);  
        
        
        // To get the year divide the resultant date into 
        // total seconds in a year (365*60*60*24) 
        $years = floor($diff / (365*60*60*24));  
        
        
        // To get the month, subtract it with years and 
        // divide the resultant date into 
        // total seconds in a month (30*60*60*24) 
        $months = floor(($diff - $years * 365*60*60*24) 
                                    / (30*60*60*24));  
        
        
        // To get the day, subtract it with years and  
        // months and divide the resultant date into 
        // total seconds in a days (60*60*24) 
        $days = floor(($diff - $years * 365*60*60*24 -  
                    $months*30*60*60*24)/ (60*60*24)); 
        
        
        // To get the hour, subtract it with years,  
        // months & seconds and divide the resultant 
        // date into total seconds in a hours (60*60) 
        $hours = floor(($diff - $years * 365*60*60*24  
            - $months*30*60*60*24 - $days*60*60*24) 
                                        / (60*60));  
        
        
        // To get the minutes, subtract it with years, 
        // months, seconds and hours and divide the  
        // resultant date into total seconds i.e. 60 
        $minutes = floor(($diff - $years * 365*60*60*24  
                - $months*30*60*60*24 - $days*60*60*24  
                                - $hours*60*60)/ 60);  
        
        
        // To get the minutes, subtract it with years, 
        // months, seconds, hours and minutes  
        $seconds = floor(($diff - $years * 365*60*60*24  
                - $months*30*60*60*24 - $days*60*60*24 
                        - $hours*60*60 - $minutes*60));  
        
        // Print the result
        return [
            0=>$days,
            1=>$hours,
            2=>$minutes,
            3=>$seconds
        ];
    }


}
