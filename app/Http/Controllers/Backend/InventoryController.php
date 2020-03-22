<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\SubCategory;
use App\Models\Manufacturer;
use File;

class InventoryController extends Controller
{
    public $path = 'backend.pages.Inventory.';
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $inventory = Inventory::paginate(16);
        return view($this->path.'index',compact('inventory'));
    }

    public function create()
    {
        $lang = \Lang::locale();
        $subCat = SubCategory::select('*')->pluck($lang.'_name','id');
        $mans = Manufacturer::select('*')->pluck($lang.'_name','id');
        return view($this->path.'create',compact('subCat','mans'));
    }

    public function store(Request $request)
    {					
        // dd($request->all());
        $request->validate([
            'en_name'                     => 'required|max:255|min:2',
            'ar_name'                     => 'required|max:255|min:2',
            'qty'                         => 'required|numeric',
            'price'                       => 'required',
            'inventory_image'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:4196|required',
        ]);

        $path_inventory_image = public_path().'/backend/dashboard_images/Inventory/';
        File::makeDirectory($path_inventory_image, $mode = 0777, true, true);

        $inventory = new Inventory();
        $inventory->en_name = $request->en_name;
        $inventory->ar_name = $request->ar_name;
        $inventory->manufacturer_id = $request->manufacturer_id;
        $inventory->qty = $request->qty;
        $inventory->price = $request->price;
        $inventory->sub_categories_id = $request->sub_categories_id;

        if ($request->hasFile('inventory_image')){
            $imageName = time().'.'.request()->inventory_image->getClientOriginalExtension();
            $request->inventory_image->move($path_inventory_image, $imageName);
            $inventory->inventory_image = $imageName;
        }

        $inventory->save();
        

        return redirect()->route('inventories')->with('success',__('tr.Item Saved Successfully'));


    }

    public function show($id)
    {
        $inventory = Inventory::findOrfail($id);
        return view($this->path.'show',compact('inventory'));
    }

    public function edit($id)
    {
        $inventory = Inventory::findOrfail($id);
        return view($this->path.'edit',compact('inventory'));
    }

    public function update(Request $request)
    {
        $inventory = Inventory::findOrfail($id);

        $request->validate([
            'en_name'                     => 'required|max:255|min:2',
            'ar_name'                     => 'required|max:255|min:2',
            'manufacturer'                => 'required|email|unique:users',
            'qty'                         => 'required|email',
            'price'                       => 'required',
            'inventory_image'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:4196',
        ]);

        
        $inventory->en_name = $request->en_name;
        $inventory->ar_name = $request->ar_name;
        $inventory->manufacturer_id = $request->manufacturer_id;
        $inventory->qty = $request->qty;
        $inventory->price = $request->price;
        $inventory->sub_categories_id = $request->sub_categories_id;

        if ($request->hasFile('inventory_image')){
            $imageName = time().'.'.request()->sub_image->getClientOriginalExtension();
            $request->sub_image->move($path_inventory_image, $imageName);
            $inventory->inventory_image = $imageName;
        }

        $inventory->save();

        return redirect()->route('inventories')->with('success',__('tr.Item Saved Successfully'));


    }

    public function destroy($id)
    {
        $inventory = Inventory::findOrfail($id);
        $inventory->delete();

        return redirect()->route('inventories')->with('success',__('tr.Item Deleted Successfully'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $inventory = Customer::select('inventories.id',
                                 'inventories.ar_name',
                                 'inventories.en_name',
                                 'inventories.manufacturer',
                                 'inventories.qty',
                                 'inventories.price',
                                 'sub_categories.id as sub_categories_id',
                                 'sub_categories.en_name as sub_en_name',
                                 'sub_categories.ar_name as sub_ar_name',
                                 'sub_categories.en_desc as sub_en_desc',
                                 'sub_categories.ar_desc as sub_ar_desc')
                        ->join('sub_categories','sub_categories.id','inventories.sub_categories_id')
                        ->where('inventories.ar_name','like','%'.$search.'%')
                        ->orWhere('inventories.en_name','like','%'.$search.'%')
                        ->orWhere('inventories.manufacturer','like','%'.$search.'%')
                        ->orWhere('inventories.qty','like','%'.$search.'%')
                        ->orWhere('inventories.price','like','%'.$search.'%')
                        ->orWhere('sub_categories.en_name','like','%'.$search.'%')
                        ->orWhere('sub_categories.ar_name','like','%'.$search.'%')
                        ->orWhere('sub_categories.en_desc','like','%'.$search.'%')
                        ->orWhere('sub_categories.ar_desc','like','%'.$search.'%')
                        ->paginate(16);

                        
        return view($this->path.'search',compact('inventory'));
    }
}
