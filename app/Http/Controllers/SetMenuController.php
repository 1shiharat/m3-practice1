<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SetMenu;
use App\Models\SetMenuHaveProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetMenuController extends Controller
{

    public function index()
    {
        $products = Product::get();
        return view('store_set_menu', compact('products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $set_menu = SetMenu::create([
            'shop_id' => Auth::id(),
            'name' => $request->name,
        ]);

        $products = [];
        if (isset($request->product1)) {
            $products[] = $request->product1;
        }
        if (isset($request->product2)) {
            $products[] = $request->product2;
        }
        if (isset($request->product3)) {
            $products[] = $request->product3;
        }
        foreach ($products as $product) {
            SetMenuHaveProduct::create([
                'set_menu_id' => $set_menu->id,
                'product_id' => $product
            ]);
        }

        $message = '商品情報が登録されました';
        return view('store_product', compact('message'));
    }

    public function update_form($id)
    {

        $products = Product::get();
        $set_menu =  SetMenu::find($id);
        $have_products = [];
        $haves =  SetMenuHaveProduct::where('set_menu_id', $set_menu->id)->get();
        foreach ($haves as $have) {
            $have_products[$set_menu->id][] = Product::find($have->product_id);
        }
        return view('update_set_menu', compact('products', 'set_menu', 'have_products'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $set_menu = SetMenu::find($id);
        $set_menu->update([
            'shop_id' => Auth::id(),
            'name' => $request->name,
        ]);

        $set_products = [];
        if (isset($request->product1)) {
            $set_products[] = $request->product1;
        }
        if (isset($request->product2)) {
            $set_products[] = $request->product2;
        }
        if (isset($request->product3)) {
            $set_products[] = $request->product3;
        }
        $haves =  SetMenuHaveProduct::where('set_menu_id', $set_menu->id)->get();
        foreach ($haves as $have) {
            $have->delete();
        }

        $haves = [];
        foreach ($set_products as $set_product) {
            $haves[] = SetMenuHaveProduct::create([
                'set_menu_id' => $set_menu->id,
                'product_id' => $set_product
            ]);
        }

        $products = Product::get();

        $have_products = [];
        foreach ($haves as $have) {
            $have_products[$set_menu->id][] = Product::find($have->product_id);
        }
        $message = '商品情報が更新されました';
        return view('update_set_menu', compact('set_menu', 'products', 'have_products', 'message'));
    }

    public function delete_confirm($id)
    {
        return view('delete_set_menu', compact('id'));
    }
    public function delete($id)
    {
        $set_menu = SetMenu::find($id);

        $set_menu->delete();

        $haves = SetMenuHaveProduct::where('set_menu_id', $id)->get();
        foreach ($haves as $have) {
            $have->delete();
        }
        $message = '削除しました';
        return redirect(route('admin'));
    }
}
