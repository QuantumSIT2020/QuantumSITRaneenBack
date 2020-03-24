<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public $path = 'backend.';
    
    public function index()
    {
        return view($this->path.'index');
    }
    
}
