<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GroupAttributes;

class Attributes extends Model
{
    protected $fillable = ['en_name', 'ar_name','attribute_group_id'];

        public function GroupAttributes(){
        return $this->belongsTo('App\Models\GroupAttributes','attribute_group_id');
    }

}
