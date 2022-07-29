<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Cart\CartService;
use App\Http\Services\Cart\CheckoutService;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    protected $cartService;
    protected $checkoutService;

    public function __construct(CartService $cartService, CheckoutService $checkoutService)
    {
        $this->cartService = $cartService;
        $this->checkoutService = $checkoutService;
    }

    public function index()
    {
        $products = $this->cartService->getProducts();
        return view('carts.checkout', [
            'title' => 'Đặt hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function store(CheckoutRequest $request)
    {
        if (count(Session::get('carts')) == 0) {
            Session::flash('error', "Giỏ hàng không có sản phẩm");
            return redirect('/checkout');
        } else {
            $user_id = Auth::user()->id;
            if($this->checkoutService->create($request, $user_id)) {
                Session::flash('success', "Đặt hàng thành công");
                return redirect('/carts');
            } else {
                Session::flash('error', "Chúc mừng bạn đã không bị tốn tiền");
            }
        }
    }
}
