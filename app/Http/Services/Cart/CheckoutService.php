<?php

namespace App\Http\Services\Cart;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use App\Models\Orders;
use App\Models\Order_detail;
use App\Http\Services\Product\ProductService;

class CheckoutService
{

    public function create($request, $id)
    {
        $carts = Session::get('carts');
        try {
            if ($order = Orders::create([
                'user_id' => (int) $id,
                'order_note' =>(string) $request->input('order_note'),
                'name' => (string) $request->input('name'),
                'email' => (string) $request->input('email'),
                'phone' => (string) $request->input('phone'),
                'address' => (string) $request->input('address')
            ])) {
                foreach ($carts as $product_id => $products) {
                    foreach($products as $product) {
                        Order_detail::create([
                            'order_id' => (int) $order->id,
                            'product_id' =>(string) $product_id,
                            'size' => (string) $product['size'],
                            'price' => $this->calPrice($product_id, $product['qty']),
                            'quantity' => (string) $product['qty']
                        ]);
                    }
                }
                Session::flash('success', 'Tạo đơn hàng thành công');
                Session::put('carts', []);
                Session::save();
                return true;
            }
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
    }
    public function calPrice($product_id, $quantity)
    {
        $product = ProductService::getProduct($product_id)[0];
        if($product->price_sale != null) {
            return (int)$product->price_sale*(int)$quantity;
        } else {
            return (int)$product->price*(int)$quantity;
        }
    }
}
