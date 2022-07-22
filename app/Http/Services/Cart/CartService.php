<?php

namespace App\Http\Services\Cart;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use App\Models\Product;


class CartService
{

    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');
        $size = $request->input('size');
        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc sản phẩm không chính xác');
            return false;
        }
        //Session::flush();
        $carts = Session::get('carts');
        if(isset($carts[$product_id])) {
            $chk = 0;
            foreach($carts[$product_id] as $key => $c) {
                if($carts[$product_id][$key]['size'] == $size) {
                    $chk++;
                    $carts[$product_id][$key]['qty'] = $carts[$product_id][$key]['qty'] + $qty;
                }
            }
            if($chk == 0) {
                Session::push('carts.'.$product_id, [
                    'qty' => $qty,
                    'size' => $size
                ]);
            } else {
                Session::put('carts', $carts);
            }
            Session::save();
        } else {
            $carts[$product_id] = [[
                'qty' => $qty,
                'size' => $size
            ]];
            Session::put('carts', $carts);
            Session::save();
        }
        $carts = Session::get('carts');
        return true;
    }
    public function getProducts()
    {
        $carts = Session::get('carts');

        if (is_null($carts)) {

            return [];
        }

        $product_id = array_keys($carts);
        return Product::select('id', 'name', 'thumb', 'price', 'price_sale')
                        ->where('active', 1)
                        ->whereIn('id', $product_id)
                        ->get();
    }



}

