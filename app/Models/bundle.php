<?php

namespace App\Models;
use App\Models\product_bundle;
use App\Models\Product;
use App\Models\Product_Gallery;
use Illuminate\Database\Eloquent\Model;

class bundle extends Model
{
    public function getMainImage(){
        $bundle = product_bundle::where('bundle_id',$this->id)->get()->first();
//        dd($bundle->product_id);
        return Product::findOrfail($bundle->product_id);
    }

    public function getMainGallery(){
        $bundle = product_bundle::where('bundle_id',$this->id)->get()->first();
//        dd($bundle->product_id);
        return Product_Gallery::where('product_id',$bundle->product_id)->get();
    }
}
