<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\WishList;

class Customer extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public static function country(){
        return [
            1 => __("tr.Egypt"),
        ];
    }

    public static function city(){
        return [
            "1" => __("tr.Alexandria"),
            "2" => __("tr.Aswan"),
            "3" => __("tr.Asyut"),
            "4" => __("tr.Beheira"),
            "5" => __("tr.Beni Suef"),
            "6" => __("tr.Cairo"),
            "7" => __("tr.Dakahlia"),
            "8" => __("tr.Damietta"),
            "9" => __("tr.Faiyum"),
            "10" => __("tr.Gharbia"),
            "11" => __("tr.Giza"),
            "12" => __("tr.Ismailia"),
            "13" => __("tr.Kafr Alsheikh"),
            "14" => __("tr.Luxor"),
            "15" => __("tr.Matruh"),
            "16" => __("tr.Minya"),
            "17" => __("tr.Monufia"),
            "18" => __("tr.New Valley"),
            "19" => __("tr.North Sinai"),
            "20" => __("tr.Port Said"),
            "21" => __("tr.Qalyubia"),
            "22" => __("tr.Qena"),
            "23" => __("tr.Red Sea"),
            "24" => __("tr.Sharqia"),
            "25" => __("tr.Sohag"),
            "26" => __("tr.South"),
            "27" => __("tr.Suez"),
        ];
    }


    public function WishList(){
        return $this->hasMany(WishList::class);
    }
}
