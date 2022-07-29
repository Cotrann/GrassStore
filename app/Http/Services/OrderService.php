<?php

namespace App\Http\Services;
use App\Models\Orders;
use Illuminate\Support\Facades\Session;

class OrderService
{
    public function updateStatus($order)
    {
        try {
            $order->status = '0';
            $order->save();

        } catch (\Exception $error) {
            Session::flash('error', 'Vui lòng thử lại');
            \Log::info($error->getMessage());
            return false;
        }
    }

}
