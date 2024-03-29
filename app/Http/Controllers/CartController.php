<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Cart\CartService;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }

        return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = $this->cartService->getProducts();
        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product_id = $request->input('product_id');
        $size = $request->input('size');
        $carts = Session::get('carts');
        foreach($carts[$product_id] as $key => $c) {
            if($c['size'] == $size) {
                if($request->input('type') == 'increase') {
                    $carts[$product_id][$key]['qty'] = $carts[$product_id][$key]['qty'] + 1;
                } elseif ($request->input('type') == 'decrease') {
                    $carts[$product_id][$key]['qty'] = $carts[$product_id][$key]['qty'] - 1;
                }
            }
        }
        Session::put('carts', $carts);
        Session::save();
        return response()->json([
            'error' => false,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $size)
    {

        $carts = Session::get('carts');
        foreach($carts[$id] as $key => $c) {
            if($c['size'] == $size) {
                if(count($carts[$id]) <= 1) {
                    unset($carts[$id]);
                } else {
                    unset($carts[$id][$key]);
                }
            }
        }

        Session::put('carts', $carts);
        Session::save();
        return redirect('/carts');
    }
}
