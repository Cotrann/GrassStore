<?php

namespace App\Http\Services\User;

use App\Models\User;
use App\Models\Product;
use App\Models\Orders;
use Illuminate\Support\Facades\Session;

class UserService
{
    public function getUserById($id)
    {
        return User::where('id', $id)
        ->firstOrFail();
    }

    public function update($user, $request)
    {
        try {
            $user->fill($request->input());
            $user->save();

            Session::flash('success', 'Cập nhật thông tin thành công');
        } catch (\Exception $error) {
            Session::flash('error', 'Vui lòng thử lại');
            \Log::info($error->getMessage());
            return false;
        }

        return true;
    }

    public function changePassword($user, $request)
    {
        try {
            $user->password = bcrypt($request->input('passnew'));
            $user->save();
            Session::flash('success', 'Cập nhật mật khẩu thành công');
        } catch (\Exception $error) {
            Session::flash('error', 'Vui lòng thử lại');
            \Log::info($error->getMessage());
            return false;
        }

        return true;
    }
}

