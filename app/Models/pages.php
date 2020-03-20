<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pages extends Model
{
    protected $fillable = ['en_name', 'ar_name','en_desc','ar_desc','page_image'];

}
