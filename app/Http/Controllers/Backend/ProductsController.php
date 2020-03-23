<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufacturer;
use App\Models\SubCategory;
use App\Models\GroupAttributes;
use App\Models\Attributes;
use App\Models\Product_Gallery;
use App\Models\Product_attribute;
use File;

class ProductsController extends Controller
{
    public $path = 'backend.pages.Products.';
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $products = Product::all();
        return view($this->path.'index',compact('products'));
    }

    
    public function create()
    {
        $lang = \Lang::locale();
        $mans = Manufacturer::select('*')->pluck($lang.'_name','id');
        $subs = SubCategory::select('*')->pluck($lang.'_name','id');
        $groups = GroupAttributes::select('id',$lang.'_name as name')->get();
        $attributes = Attributes::select('id',$lang.'_name as name','attribute_group_id')->get();
        return view($this->path.'create',compact('mans','subs','groups','attributes'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'en_name' => 'required|min:2|max:255',
            'ar_name' => 'required|min:2|max:255',
            'video' => 'required',
            'price' => 'required',
            'first_quantity' => 'required',
            'description' => 'required|min:2|max:255',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4196|required',
        ]);

        $path_product_image = public_path().'/backend/dashboard_images/Products/';
        File::makeDirectory($path_product_image, $mode = 0777, true, true);
        
        $path_product_gallery = public_path().'/backend/dashboard_images/Products/';
        File::makeDirectory($path_product_gallery, $mode = 0777, true, true);

        $product = new Product();
        $product->en_name = $request->en_name;
        $product->ar_name = $request->ar_name;
        $product->description = $request->description;
        $product->video = $request->video;
        $product->price = $request->price;
        $product->quantity = $request->first_quantity;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->sub_categories_id = $request->sub_categories_id;
        
        if ($request->hasFile('product_image')){
            $imageName = time().'.'.request()->product_image->getClientOriginalExtension();
            $request->product_image->move($path_product_image, $imageName);
            $product->product_image = $imageName;
        }

        $product->save();

        if ($request->hasFile('image')){
            for ($i=0; $i < count($request->image); $i++) { 
                $gallery = new Product_Gallery();
                $imageName = time().'.'.$request->image[$i]->getClientOriginalExtension();
                $request->image[$i]->move($path_product_gallery, $imageName);
                $gallery->image = $imageName;
                $gallery->product_id = $product->id;
                $gallery->save();
            }
        }

        for ($i=0; $i < count($request->attribute); $i++) { 
            $attribute = new Product_attribute();
            $attribute->product_id = $product->id;
            $attribute->attribute_id = $request->attribute[$i];
            $attribute->values = $request->quantity[$i];
            $attribute->save();
        }

        return redirect()->route('products')->with('success',__('tr.Product Saved Successfully'));

        
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
