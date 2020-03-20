<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Cookie;

class LanguageController extends Controller
{
    public function index($lang)
    {
        if(in_array($lang,['en','ar'])){
            Cookie::queue(Cookie::make('webLanG',$lang, 10080));
            session(['lang' => $lang]);
        }else{
            if(Cookie::has('webLanG')){
                Cookie::queue(Cookie::forget('webLanG'));
            }
            Cookie::queue(Cookie::make('webLanG',$lang, 10080));
        }
        return back();
    }
}
