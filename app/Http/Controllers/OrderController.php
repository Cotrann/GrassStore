<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\OrderService;
use App\Models\Orders;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function update($id)
    {
        $order = Orders::find($id);
        $this->orderService->updateStatus($order);
        return response()->json(['status' => 1]);
    }
}
