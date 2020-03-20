<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['en_name', 'ar_name','en_desc','ar_desc','sub_image','child_category_id'];

    public function ChildCategory(){
        return $this->belongsTo('App\Models\ChildCategory','child_category_id');
    }
}
