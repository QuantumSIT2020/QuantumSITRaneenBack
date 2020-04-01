<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\subscribe;
use Illuminate\Http\Request;
use App\Models\contactUs;

class SubscribesController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([

            'email'                                         => 'required|email|unique:subscribes',

        ]);

        $subscribe = new subscribe();

        $subscribe->email     =strip_tags($request->email);
        $subscribe->save();

        return back()->with('success',__('tr.Thanks For Your subscribe'));
    }


}
