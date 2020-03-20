<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $fillable = ['en_name', 'ar_name','en_desc','ar_desc','main_image'];

}
