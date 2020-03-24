<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupAttributes;

class GroupAttributeController extends Controller
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
          $GroupAttributes = GroupAttributes::select($lang.'_name as name','id')->get();
          return view('backend.pages.GroupAttributes.index',compact('GroupAttributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.pages.GroupAttributes.create');
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


        $GroupAttributes= new GroupAttributes();
        $GroupAttributes->en_name                 =strip_tags($request->en_name);
        $GroupAttributes->ar_name                 =strip_tags($request->ar_name);

        $GroupAttributes->save();


        return redirect()->route('GroupAttributes')->with('success',__('tr.GroupAttributes Saved Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $GroupAttributes = GroupAttributes::findOrfail($id);
        return view('backend.pages.GroupAttributes.show',compact('GroupAttributes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $GroupAttributes = GroupAttributes::findOrfail($id);
        return view('backend.pages.GroupAttributes.edit',compact('GroupAttributes'));
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
        $GroupAttributes = GroupAttributes::findOrfail($id);

        $request->validate([
            'en_name'                     => 'required|max:255|min:2',
            'ar_name'                     => 'required|max:255|min:2',
        ]);


        $GroupAttributes->en_name                 =strip_tags($request->en_name);
        $GroupAttributes->ar_name                 =strip_tags($request->ar_name);



        $GroupAttributes->save();

        return redirect()->route('GroupAttributes')->with('success',__('tr.$GroupAttributes Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $GroupAttributes = GroupAttributes::findOrfail($id);
        $GroupAttributes->delete();

        return redirect()->route('GroupAttributes')->with('success',__('tr.GroupAttributes Deleted Successfully'));
    }
}
