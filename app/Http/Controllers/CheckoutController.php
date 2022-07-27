<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Cart\CartService;
use App\Http\Services\Cart\CheckoutService;
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

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        if($this->checkoutService->create($request, $user_id)) {
            return redirect('/');
        } else {
            Session::flash('error', "Chúc mừng bạn đã không bị tốn tiền");
        }
    }

}
