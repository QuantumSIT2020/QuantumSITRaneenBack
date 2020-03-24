<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupAttributes;
use App\Models\Attributes;

class AttributesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = \Lang::getLocale();
        $GroupAttributes = GroupAttributes::all();
        $Attributes = Attributes::all();
        return view('backend.pages.Attributes.index',compact('GroupAttributes','Attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = \Lang::getLocale();
        $GroupAttributes = GroupAttributes::select($lang.'_name as GroupAttributes','id')->get();
        $Attributes = Attributes::select($lang.'_name as name','id')->get();
        return view('backend.pages.Attributes.create',compact('GroupAttributes','Attributes'));
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
            'en_name'                     => 'required|max:255|min:2',
            'ar_name'                     => 'required|max:255|min:2',
        ]);


        $Attributes= new Attributes();
        $Attributes->en_name                 = strip_tags($request->en_name);
        $Attributes->ar_name                 = strip_tags($request->ar_name);
        $Attributes->attribute_group_id      = $request->attribute_group_id;


        $Attributes->save();


        return redirect()->route('Attributes')->with('success',__('tr.Attributes Saved Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Attributes = Attributes::findOrfail($id);
        return view('backend.pages.Attributes.show',compact('Attributes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lang = \Lang::getLocale();
        $Attributes = Attributes::findOrfail($id);
        $GroupAttributes = GroupAttributes::select($lang.'_name as name','id')->get();
        return view('backend.pages.Attributes.edit',compact('Attributes','GroupAttributes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Attributes = Attributes::findOrfail($id);

        $request->validate([
            'en_name'                                       => 'required|max:255|min:2',
            'ar_name'                                       => 'required|max:255|min:2',


        ]);


        $Attributes->en_name                 =strip_tags($request->en_name);
        $Attributes->ar_name                 =strip_tags($request->ar_name);
        $Attributes->attribute_group_id      = $request->attribute_group_id;





        $Attributes->save();

        return redirect()->route('Attributes')->with('success',__('tr.Attributes Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Attributes = Attributes::findOrfail($id);
        $Attributes->delete();

        return redirect()->route('Attributes')->with('success',__('tr.Attributes Deleted Successfully'));
    }
}
