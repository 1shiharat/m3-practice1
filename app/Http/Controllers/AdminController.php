<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SetMenu;
use App\Models\SetMenuHaveProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $products =  Product::where('shop_id', Auth::id())->get();
        $set_menus =  SetMenu::where('shop_id', Auth::id())->get();
        $have_products = [];
        foreach ($set_menus as $set_menu) {
            $haves =  SetMenuHaveProduct::where('set_menu_id', $set_menu->id)->get();
            foreach ($haves as $have) {
                $have_products[$set_menu->id][] = Product::find($have->product_id);
            }
        }
        // dd($products, $set_menus, $have_products);

        return response(view('admin', compact('products', 'set_menus', 'have_products')))->withHeaders(['Cache-Control' => 'no-store']);
    }
}
