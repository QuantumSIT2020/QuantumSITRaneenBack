<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public $path = 'backend.pages.orders.';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::all();
        return view($this->path.'index',compact('orders'));
    }
}
