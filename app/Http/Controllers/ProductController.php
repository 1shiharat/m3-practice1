<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        return view('store_product');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        Product::create([
            'shop_id' => Auth::id(),
            'name' => $request->name,
            'price' => $request->price,
        ]);

        $message = '商品情報が登録されました';
        return view('store_product', compact('message'));
    }

    public function update_form($id)
    {
        $product = Product::find($id);
        return view('update_product', compact('product'));
    }
    public function update($id, Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $product = Product::find($id);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'shop_id' => Auth::id()
        ]);


        $message = '商品情報が更新されました';
        return view('update_product', compact('product', 'message'));
    }

    public function delete_confirm($id)
    {
        return view('delete_product', compact('id'));
    }
    public function delete($id)
    {
        $product = Product::find($id);

        $product->delete();
        $message = '削除しました';
        return redirect(route('admin'));
    }
}
