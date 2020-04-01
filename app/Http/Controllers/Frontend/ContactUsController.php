<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contactUs;
use App\Models\Partners;

class ContactUsController extends Controller
{
    public $path = 'frontend.pages.contactus.';

    public function index()
    {
        $branches = Partners::all();
        return view($this->path.'index',compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                                          => 'required|max:255|min:2',
            'email'                                         => 'required|email|unique:contact_us',

        ]);

        $contactUs = new contactUs();

        $contactUs->name      =strip_tags($request->name);
        $contactUs->email     =strip_tags($request->email);
        $contactUs->message   =strip_tags($request->message);
        $contactUs->save();

        return back()->with('success',__('tr.Thanks For Your Message'));
    }
}
