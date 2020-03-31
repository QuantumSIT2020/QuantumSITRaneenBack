<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contactUs;

class contactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $contactUs = contactUs::select('name','id','email','message')->get();

        return view('backend.pages.contactus.index',compact('contactUs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contactUs = contactUs::select('name','id','email','message')->get();
        return view('backend.pages.contactus.create',compact('contactUs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                                          => 'required|max:255|min:2',
            'email'                                         => 'required|',

        ]);

        $contactUs = new contactUs();

        $contactUs->name      =strip_tags($request->name);
        $contactUs->email     =strip_tags($request->email);
        $contactUs->message   =strip_tags($request->message);
        $contactUs->save();

        return redirect()->route('contactus')->with('success',__('tr.contactUs Added successfully'));
    }


}
