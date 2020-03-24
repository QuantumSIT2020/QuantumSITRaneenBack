<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacturer;
use File;

class ManufacturerController extends Controller
{
    public $path = 'backend.pages.Manufacturer.';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $man = Manufacturer::paginate(16);
        return view($this->path.'index',compact('man'));
    }

    public function create()
    {
        return view($this->path.'create');
    }

    public function store(Request $request)
    {					
        $request->validate([
            'en_name'                     => 'required|max:255|min:2',
            'ar_name'                     => 'required|max:255|min:2',
        ]);

        $path_manufacturer_image = public_path().'/backend/dashboard_images/Manufacturer/';
        File::makeDirectory($path_manufacturer_image, $mode = 0777, true, true);

        $man = new Manufacturer();
        $man->en_name = $request->en_name;
        $man->ar_name = $request->ar_name;
        $man->email = $request->email;
        $man->mobile = $request->mobile;
        $man->address = $request->address;
        $man->website = $request->website;
        $man->other_info = $request->other_info;


        if ($request->hasFile('manufacturer_logo')){
            $imageName = time().'.'.request()->manufacturer_logo->getClientOriginalExtension();
            $request->manufacturer_logo->move($path_manufacturer_image, $imageName);
            $man->manufacturer_logo = $imageName;
        }

        $man->save();
        

        return redirect()->route('manufacturers')->with('success',__('tr.Manufacturer Saved Successfully'));


    }

    public function show($id)
    {
        $man = Manufacturer::findOrfail($id);
        return view($this->path.'show',compact('man'));
    }

    public function edit($id)
    {
        $man = Manufacturer::findOrfail($id);
        return view($this->path.'edit',compact('man'));
    }

    public function update(Request $request)
    {
        $man = Manufacturer::findOrfail($request->man_id);

        $request->validate([
            'en_name'                     => 'required|max:255|min:2',
            'ar_name'                     => 'required|max:255|min:2',
        ]);

        
        $man->en_name = $request->en_name;
        $man->ar_name = $request->ar_name;
        $man->email = $request->email;
        $man->mobile = $request->mobile;
        $man->address = $request->address;
        $man->website = $request->website;
        $man->other_info = $request->other_info;

        if ($request->hasFile('manufacturer_logo')){
            $imageName = time().'.'.request()->manufacturer_logo->getClientOriginalExtension();
            $request->manufacturer_logo->move($path_manufacturer_image, $imageName);
            $man->manufacturer_logo = $imageName;
        }

        $man->save();

        return redirect()->route('manufacturers')->with('success',__('tr.Manufacturer Saved Successfully'));


    }

    public function destroy($id)
    {
        $man = Manufacturer::findOrfail($id);
        $man->delete();

        return redirect()->route('manufacturers')->with('success',__('tr.Manufacturer Deleted Successfully'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $man = Manufacturer::select('*')
                        ->where('manufacturers.ar_name','like','%'.$search.'%')
                        ->orWhere('manufacturers.en_name','like','%'.$search.'%')
                        ->orWhere('manufacturers.other_info','like','%'.$search.'%')
                        ->orWhere('manufacturers.email','like','%'.$search.'%')
                        ->orWhere('manufacturers.mobile','like','%'.$search.'%')
                        ->orWhere('manufacturers.address','like','%'.$search.'%')
                        ->orWhere('manufacturers.website','like','%'.$search.'%')
                        ->paginate(16);

                        
        return view($this->path.'search',compact('man'));
    }
}
