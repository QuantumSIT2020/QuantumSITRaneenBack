<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ChildCategory;

class MainCategory extends Model
{
    protected $fillable = ['en_name', 'ar_name','en_desc','ar_desc','main_image'];

    public static function countChilds($id)
    {
        return ChildCategory::where('main_category_id',$id)->count();
    }
}
