<?php

namespace App\Http\Services\User;

use App\Models\User;
use App\Models\Product;
use App\Models\Orders;
use App\Models\Order_detail;
use Illuminate\Support\Facades\Session;

class UserAdminService
{
    public function delete($request)
    {
        $user = User::find($request->id);
        if ($user) {
            $orders = $user->orders;
            foreach ($orders as $order) {
                $Order_detail = Order_detail::where('order_id', $order->id)->delete();
                $order->delete();
            }
            $user->delete();
            return true;
        }

        return false;

    }

    public function update($user, $request)
    {
        try {
            $user->fill($request->input());
            $user->level = $request->level;
            $user->save();

            Session::flash('success', 'Cập Nhật Người Dùng Thành Công');
        } catch (\Exception $error) {

            Session::flash('error', 'Vui lòng thử lại');
            \Log::info($error->getMessage());
            return false;
        }

        return true;
    }
}
