<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partners;
use File;

class PartnersController extends Controller
{
    public $path = 'backend.pages.Partners.';
    public function __construct()
   {
       $this->middleware('auth');
   }
    public function index()
    {
        $partners = Partners::paginate(16);
        return view($this->path.'index',compact('partners'));
    }

    public function create()
    {
        return view($this->path.'create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'partners_logo'                                    =>  'image|mimes:jpeg,png,jpg,gif,svg|max:4196|required',
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',

        ]);

        $path_partners_image = public_path().'/backend/dashboard_images/Partners/';
        File::makeDirectory($path_partners_image, $mode = 0777, true, true);

        $partners = new Partners();

        $partners->name = $request->name;
        $partners->mobile = $request->mobile;
        $partners->address = $request->address;

        if ($request->hasFile('partners_logo')){
            $imageName = time().'.'.request()->partners_logo->getClientOriginalExtension();
            $request->partners_logo->move($path_partners_image, $imageName);
            $partners->partners_logo = $imageName;
        }

        $partners->save();

        return redirect()->route('partners')->with('success',__('tr.Branch Added successfully'));
    }

  
    public function show($id)
    {
        $partners = Partners::findOrfail($id);
        return view($this->path.'show',compact('partners'));
    }

    public function edit($id)
    {
        $partners = Partners::findOrfail($id);
        return view($this->path.'edit',compact('partners'));
    }

    public function update(Request $request, $id)
    {
        $partners = Partners::findOrfail($id);

        $request->validate([
            'partners_logo'                                    =>  'image|mimes:jpeg,png,jpg,gif,svg|max:4196',

        ]);

        $path_partners_image = public_path().'/backend/dashboard_images/Partners/';
        File::makeDirectory($path_partners_image, $mode = 0777, true, true);

        $partners->name = 'partners';

        if ($request->hasFile('partners_logo')){
            $imageName = time().'.'.request()->partners_logo->getClientOriginalExtension();
            $request->partners_logo->move($path_partners_image, $imageName);
            $partners->partners_logo = $imageName;
        }

        $partners->save();

        return redirect()->route('partners')->with('success',__('tr.Partners Added successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partners = Partners::findOrfail($id);
        $partners->delete();

        return redirect()->route('partners')->with('success',__('tr.Partners Deleted successfully'));
    }
}
