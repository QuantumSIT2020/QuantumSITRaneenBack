<?php

namespace App\Http\Controllers\Backend;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufacturer;
use App\Models\SubCategory;
use App\Models\GroupAttributes;
use App\Models\Attributes;
use App\Models\Product_Gallery;
use App\Models\Product_attribute;
use App\Models\Review;
use App\Models\Product_sale;
use File;
use Auth;
use App\Models\User;
use Hash;

class ProductSaleController extends Controller
{
    public $path = 'backend.pages.productdiscount.';
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

        $product_sale = Product_sale::paginate(16);
        return view($this->path.'index',compact('product_sale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = \Lang::locale();
        $products = Product::all();
        $product_sale = Product_sale::select('id','discount','product_id')->get();
        return view($this->path.'create',compact('products','product_sale'));
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
            'discount' => 'required|numeric|min:2',

        ]);

        $product_sale = new Product_sale();
        $product_sale->discount = $request->discount;
        $product_sale->product_id = $request->product_id;

        $product_sale->save();
        return redirect()->route('discount')->with('success',__('tr.discount Saved Successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_sale = Product_sale::findOrfail($id);

        return view($this->path.'show',compact('product_sale'));
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
        $Product_sale = Product_sale::findOrfail($id);
        $products = Product::select('*')->pluck($lang.'_name','id');
        return view($this->path.'edit',compact('Product_sale','products'));
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
        $product_sale = Product_sale::findOrfail($id);

        $request->validate([
            'discount' => 'required|numeric|min:2',
        ]);


        $product_sale->discount                =$request->discount;
        $product_sale->product_id              =$request->product_id;

        $product_sale->save();

        return redirect()->route('discount')->with('success',__('tr.discount Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Product_sale = Product_sale::findOrfail($id);
        $Product_sale->delete();
        return redirect()->route('discount')->with('success',__('tr.discount Deleted successfully'));
    }
}
