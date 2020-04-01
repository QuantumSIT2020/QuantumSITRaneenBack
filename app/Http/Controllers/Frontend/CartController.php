<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\bundle;
use Cart;
use App\Models\Order;
use App\Models\MainOrder;
use Auth;
use Cartalyst\Stripe\Laravel\Facades\Stripe;


class CartController extends Controller
{
    public $path = 'frontend.pages.cart.';

    public function __construct()
    {
        $this->middleware('auth')->except(
            'cart',
            'store',
            'update',
            'remove',
            'destroy'
        );
    }

    public function cart()  {
        
        return view($this->path.'cart');
    }

    public function store(Request $request)
    {
        
        
        if ($request->type == 'product') {
            $product = Product::findOrfail($request->product_id);
            $options = [];
            $options[] = 'product';
            if (isset($request->product_attributes)) {
                for ($i=0; $i < count($request->product_attributes); $i++) { 
                    array_push($options,$request->product_attributes[$i]);
                }
            }

            Cart::add(
                $product->id,
                $product->en_name.' | '.$product->ar_name,
                $request->quantity,
                $request->price,
                $options
            );

            return back()->with('success',__('tr.Product Added Successfully'));
        }

        if ($request->type == 'bundle') {
            $bundle = bundle::findOrfail($request->bundle_id);
            $options = [];
            $options[] = 'bundle';
            
            Cart::add(
                $bundle->id,
                $bundle->en_name.' | '.$bundle->ar_name,
                $request->quantity,
                $bundle->price,
                $options
            );

            return back()->with('success',__('tr.Bundle Added Successfully'));
        }
        
        
    }

    public function update($id,Request $request)
    {
        $cart = Cart::get($id);
        $price = $cart->price;
        $qty = $cart->qty;
        $newQty = $request->quantity;
        $newPrice = $newQty * $price;
        $products = [
            'price' => $newPrice,
            'qty' => $newQty
            
            
        ];

        // Cart::update($id, ('name'));
        return back()->with('success',__('tr.Cart Updated Successfully'));
    }

    public function remove($id)
    {
        Cart::remove($id);
        return back()->with('success',__('tr.Item Removed Successfully'));
    }

    public function destroy()
    {
        Cart::destroy();
        return redirect()->route('home')->with('success',__('tr.Cart is Empty Now'));
    }

    public function checkout()
    {
        return view($this->path.'checkout');
    }

    public function checkoutPost(Request $request)
    {
        $total = Cart::subtotal();
        
        $charge = Stripe::charges()->create([
            'currency' => 'USD',
            'source' =>  $request->stripeToken,
            'amount' => $total,
            'description' => 'Order',
            
         ]);

        //  Cart::store('Order#'.rand(1,999));

         $mainOrder = new MainOrder();
         $mainOrder->code = 'ORDER #'.rand(1,999);
         $mainOrder->user_id = Auth::user()->id;
         $mainOrder->mobile = $request->mobile;
         $mainOrder->address = $request->address.' , City : '.$request->city.' , Country : '.$request->country;
         $mainOrder->quantity = Cart::count();
         $mainOrder->price = Cart::subtotal();
         $mainOrder->save();


         foreach (Cart::content() as $item) {
             $order = new Order();
             $order->main_order_id = $mainOrder->id;
             $order->order_id = $item->id;
             $order->name = $item->name;
             $order->options = $item->options;
             $order->quantity = $item->qty;
             $order->price = $item->price;
             $order->status = 1;
             $order->save();
         }

         
         Cart::destroy();
         return redirect()->route('cart_invoices',['id'=>$mainOrder->id])->with('success',__('tr.Payment Process is Done'));

        
    }

    public function invoices($id)
    {
        $mainOrder = MainOrder::findOrfail($id);
        $order = Order::where('main_order_id',$id)->get();
        return view($this->path.'invoices',compact('mainOrder','order'));
    }

}
