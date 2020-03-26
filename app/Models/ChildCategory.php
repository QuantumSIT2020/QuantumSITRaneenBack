<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class ChildCategory extends Model
{
    protected $fillable = ['en_name', 'ar_name','en_desc','ar_desc','child_image','main_category_id'];

    public function MainCategory(){
        return $this->belongsTo('App\Models\MainCategory','main_category_id');
    }

    public static function countSubCategory($id)
    {
        return SubCategory::where('child_category_id',$id)->count();
    }
}
