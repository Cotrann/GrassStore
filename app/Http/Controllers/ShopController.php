<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use App\Models\Menu;

class ShopController extends Controller
{

    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(SliderService $slider, MenuService $menu, ProductService $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'title' => 'Grass Store',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'products' => $this->product->show()
        ]);
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
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getproduct(Request $request)
    {
        return $this->product->getProduct($request->input('product_id'));
    }
    public function loadproduct(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->product->show($page);
        $html = '';
        $hasNext = true;
        if (count($result) < 16) {
            $hasNext = false;
        } else if($this->product->countProduct() == ($page+1)*16){
            $hasNext = false;
        }
        $html = view('product.list', ['products' => $result])->render();

        return response()->json(['html' => $html, 'hasNext' => $hasNext]);
    }
    public function detailproduct(Request $request, $id, $slug = '')
    {
        $product = Product::where('id', $id)->first();
        $productMore = $this->product->more($product);
        return view('product.detail', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productMore,
            'mmm' => Menu::select('id', 'name', 'parent_id')
                        ->orderbyDesc ('id')
                        ->where('active', 1)
                        -> get()
        ]);

    }
}
