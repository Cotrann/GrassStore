<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;

class ProductAdminService
{
    public function getMenu(Type $var = null)
    {
        return Menu::where ('active', 1) -> get();
    }

    public function getAllProduct(Type $var = null)
    {
        return Product::with('menu')
        ->orderbyDesc ('id') -> paginate(15);
    }




    public function isValidPrice($request)
    {
        if ($request->input('price_sale') > $request->input('price'))
        {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        return true;
    }

    public function create($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) {
            return false;
        }

        try {

            $request->except('_token');
            Product::create ($request->all());

            Session::flash('success', 'Tạo Sản Phẩm Thành Công');

        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function update($product, $request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) {
            return false;
        }

        try {
            $product->fill($request->input());
            $product->save();

            Session::flash('success', 'Cập Nhật Sản Phẩm Thành Công');
        } catch (\Exception $error) {

            Session::flash('error', 'Vui lòng thử lại');
            \Log::info($error->getMessage());
            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $product = Product::where('id', $request->input('id'))->first();

        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }

    public function postprice($request)
    {
        if ($request->input('menu_id') == 0) {
            $product = $this->getAllProduct();
        }
        else {
            $product = Product::where('menu_id', $request->input('menu_id')) -> get();
        }
        $rate = $request->input('rate');

        try {
            foreach ($product as $key => $p) {
                $p->price_sale = $p->price*(100-$rate)/100;
                $p->save();
            }

            Session::flash('success', 'Cài đặt giảm giá thành công');

        } catch (\Exception $err) {
            Session::flash('error', 'Vui lòng thử lại');
            \Log::info($err->getMessage());
            return false;
        }

    }
}
