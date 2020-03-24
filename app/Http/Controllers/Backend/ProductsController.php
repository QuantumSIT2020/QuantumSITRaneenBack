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
        $products = Product::paginate(16);
        return view($this->path.'index',compact('products'));
    }


    public function search_product(Request $request)
    {
        $search = $request->search;
        $products = Product::select('products.id as id',
            'products.en_name',
            'products.ar_name',
            'products.video',
            'products.description',
            'products.price',
            'products.quantity',
            'products.product_image',
            'manufacturers.id as manufacturer_id',
            'manufacturers.en_name as enManufacturer',
            'manufacturers.ar_name as arManufacturer',
            'sub_categories.id as sub_categories_id',
            'sub_categories.en_name as en_SubCaregory',
            'sub_categories.ar_name as ar_SubCaregory'

        )
            ->join('manufacturers','manufacturers.id','products.manufacturer_id')
            ->join('sub_categories','sub_categories.id','products.sub_categories_id')
            ->where('products.en_name','like','%'.$search.'%')
            ->orWhere('products.ar_name','like','%'.$search.'%')
            ->orWhere('products.description','like','%'.$search.'%')
            ->orWhere('products.video','like','%'.$search.'%')
            ->orWhere('products.price','like','%'.$search.'%')
            ->orWhere('products.quantity','like','%'.$search.'%')
            ->orWhere('products.product_image','like','%'.$search.'%')
            ->orWhere('manufacturers.en_name','like','%'.$search.'%')
            ->orWhere('manufacturers.ar_name','like','%'.$search.'%')
            ->orWhere('sub_categories.en_name','like','%'.$search.'%')
            ->orWhere('sub_categories.ar_name','like','%'.$search.'%')
            ->paginate(16);

        return view('backend.pages.products.search',compact('products'));
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
            $attribute->product_id        = $product->id;
            $attribute->attribute_id      = $request->attribute[$i];
            $attribute->values             = $request->quantity[$i];
            $attribute->save();
        }

        return redirect()->route('products')->with('success',__('tr.Product Saved Successfully'));

        
    }

    
    public function show($id)
    {
<<<<<<< HEAD

=======
        $product = Product::findOrfail($id);
        $attribute = Product_attribute::where('product_id',$id)->get();
        $gallery = Product_Gallery::where('product_id',$id)->get();

        return view($this->path.'show',compact('gallery','attribute','product')); 
>>>>>>> 7743d011ec326004a07f7d154d0162f0c912ff61
    }

    public function edit($id)
    {
        $lang = \Lang::locale();
        $product = Product::findOrfail($id);
        $mans = Manufacturer::select('*')->pluck($lang.'_name','id');
        $subs = SubCategory::select('*')->pluck($lang.'_name','id');
        $groups = GroupAttributes::select('id',$lang.'_name as name')->get();
        $attributes = Attributes::select('id',$lang.'_name as name','attribute_group_id')->get();
        $Product_Gallery = Product_Gallery::where('product_id', $id)->get();
        $Product_attribute = Product_attribute::where('product_id', $id)->get();
        return view($this->path.'edit',compact('mans','subs','groups','attributes','Product_Gallery','product','Product_attribute'));
    }

   
    public function update(Request $request, $id)
    {
        $product = Product::findOrfail($id);
        $request->validate([
            'en_name' => 'required|min:2|max:255',
            'ar_name' => 'required|min:2|max:255',
            'video' => 'required',
            'price' => 'required',
            'first_quantity' => 'required',
            'description' => 'required|min:2|max:255',

        ]);

        $path_product_image = public_path().'/backend/dashboard_images/Products/';
        File::makeDirectory($path_product_image, $mode = 0777, true, true);

        $path_product_gallery = public_path().'/backend/dashboard_images/Products/';
        File::makeDirectory($path_product_gallery, $mode = 0777, true, true);


        $product->en_name               = $request->en_name;
        $product->ar_name               = $request->ar_name;
        $product->description           = $request->description;
        $product->video                 = $request->video;
        $product->price                 = $request->price;
        $product->quantity              = $request->first_quantity;
        $product->manufacturer_id       = $request->manufacturer_id;
        $product->sub_categories_id     = $request->sub_categories_id;

        if ($request->hasFile('product_image')){
            $imageName = time().'.'.request()->product_image->getClientOriginalExtension();
            $request->product_image->move($path_product_image, $imageName);
            $product->product_image = $imageName;
        }


        $product->save();


         $img= $request->hasFile('image');


        if (isset($request->image)){
            for ($i=0; $i < count($request->image); $i++) {
                $gallery = new Product_Gallery();
                $imageName = time().'.'.$request->image[$i]->getClientOriginalExtension();
                $request->image[$i]->move($path_product_gallery, $imageName);
                $gallery->image = $imageName;
                $gallery->product_id = $product->id;
                $gallery->save();
            }
        }

         $att=$request->attribute;
        if(isset($att)){
            for ($i=0; $i < count($request->attribute); $i++) {
                $attribute = new Product_attribute();
                $attribute->product_id = $product->id;
                $attribute->attribute_id = $request->attribute[$i];
                $attribute->values = $request->quantity[$i];
                $attribute->save();
            }
        }




        return redirect()->route('products')->with('success',__('tr.Product updated Successfully'));
    }


    public function delete_img($id){
            $Product_Gallery = Product_Gallery::findOrFail($id);

            $Product_Gallery->delete();
            return back();
    }


    public function delete_attribute($id){
        $Product_attribute = Product_attribute::findOrFail($id);

        $Product_attribute->delete();
        return back();
    }

    
    public function destroy($id)
    {
        $product = Product::findOrfail($id);
        $product->delete();

        return redirect()->route('products')->with('success',__('tr.product Deleted Successfully'));
    }
}
