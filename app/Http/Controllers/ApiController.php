<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\SetMenu;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function items(Request $request)
    {
        $query = Product::query();
        if (isset($request->shop_id)) {
            $query->where('shop_id', $request->shop_id);
        }
        if (isset($request->price)) {
            $query->where('price', $request->price);
        }
        if (isset($request->title)) {
            $query->where('name', 'like', '%' . $request->title . '%');
        }
        $items = $query->get();

        return response()->json($items);
    }

    public function sets(Request $request)
    {

        $query = SetMenu::query();
        if (isset($request->shop_id)) {
            $query->where('shop_id');
            $sets = $query->get();
            return response()->json($sets);
        }

        return response()->json('', Response::HTTP_NOT_FOUND);
    }

    public function order(Request $request)
    {
        if ((isset($request->item_id) || isset($request->sets_id)) && isset($request->address)) {
            Order::create([
                'product_id' => $request->item_id,
                'set_menu_id' => $request->sets_id,
                'address' => $request->address
            ]);
            return response()->json('', Response::HTTP_CREATED);
        }
        return response()->json('', Response::HTTP_NOT_FOUND);
    }
}
