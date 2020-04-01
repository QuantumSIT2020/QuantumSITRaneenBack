<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subscribe;

class SubscribesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $subscribe = subscribe::select('id','email')->get();

        return view('backend.pages.subscribe.index',compact('subscribe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subscribe = subscribe::select('id','email')->get();
        return view('backend.pages.subscribe.create',compact('subscribe'));
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

            'email'                                         => 'required|email|unique:subscribes',

        ]);

        $subscribe = new subscribe();

        $subscribe->email     =strip_tags($request->email);
        $subscribe->save();

        return redirect()->route('Subscribe')->with('success',__('tr.Subscribe Added successfully'));
    }


}
