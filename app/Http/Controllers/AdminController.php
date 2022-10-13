<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $products =  Product::where('shop_id', Auth::id())->get();
        return view('admin', compact('products'));
    }
}
