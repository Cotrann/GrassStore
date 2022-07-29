<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;

class OrderAdminController extends Controller
{
    public function list()
    {
        $orders = Orders::paginate(10);
        foreach($orders as $order)
        {
            $order->items = 0;
            $order->total = 0;
            foreach ($order->products as $product) {
                $order->items += $product->pivot->quantity;
                $order->total += $product->pivot->price;
            }
            if ($order->items < 3) {
                $order->total += 30000;
            }
        }
        return view('admin.order.list', [
            'title' => 'Danh sách Đơn Hàng',
            'orders' => $orders
        ]);
    }

    public function show($order_id)
    {
        $orders = Orders::find($order_id);
        $products = $orders->products;
        $orders->items = 0;
        $orders->total = 0;
        foreach ($orders->products as $product) {
            $orders->items += $product->pivot->quantity;
            $orders->total += $product->pivot->price;
        }
        if ($orders->items < 3) {
            $orders->total += 30000;
        }
        //dd($products);
        return view('admin.order.detail_order',[
            'title' => 'Xem chi tiết đơn hàng',
            'orders' => $orders,
            'products' => $products
        ]);
        //dd($orders);
    }
}
