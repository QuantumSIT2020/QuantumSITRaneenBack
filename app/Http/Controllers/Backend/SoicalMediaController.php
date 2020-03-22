<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Soicalmedia;

class SoicalMediaController extends Controller
{

    public function index()
    {
        $soicalmedia_data = Soicalmedia::findOrfail(1);
        return view('backend.pages.soicalmedia.index' ,compact('soicalmedia_data'));
    }


    public function update(Request $request)
    {
        $facebook                = $request->facebook;
        $twitter                 = $request->twitter;
        $instagram               = $request->instagram;
        $massenger               = $request->massenger;
        $whatsup                 = $request->whatsup;
        $address                 = $request->address;
        $gmail                   = $request->gmail;
        $phone_number            = $request->phone_number;

        $SoicalMedia = Soicalmedia::findOrfail(1);
        $SoicalMedia->facebook          = $facebook;
        $SoicalMedia->twitter           = $twitter;
        $SoicalMedia->instagram         = $instagram;
        $SoicalMedia->massenger         = $massenger;
        $SoicalMedia->whatsup           = $whatsup;
        $SoicalMedia->address           = $address;
        $SoicalMedia->gmail             = $gmail;
        $SoicalMedia->phone_number      = $phone_number;




        $SoicalMedia->save();

        return back();
    }


}
