<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductAdminService;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\DiscountRequest;
use App\Models\Product;


class ProductController extends Controller
{

    protected $productAdminService;

    public function __construct(ProductAdminService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.list',[
            'title'=>'Danh Sách Sản Phẩm Mới Nhất',
            'product'=>$this->productAdminService->getAllProduct()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add', [
            'title' => 'Thêm Sản Phẩm Mới',
            'menu' => $this->productAdminService->getMenu()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $result = $this->productAdminService->create($request);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.edit', [
            'title' => 'Chỉnh Sửa Sản Phẩm '.$product->name,
            'product' => $product,
            'menu' => $this->productAdminService->getMenu()
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
    public function update(Product $product, ProductRequest $request)
    {
        $this->productAdminService->update($product, $request);


        return redirect(url('admin/products/list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = $this->productAdminService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Sản Phẩm'
            ]);
        }

        return response()->json([
            'error' => true
        ]);

    }

    public function getprice()
    {
        return view('admin.menu.discount', [
            'title' => 'Cài đặt giảm giá',
            'menu' => $this->productAdminService->getMenu()
        ]);
    }

    public function postprice(DiscountRequest $request)
    {
        $result = $this->productAdminService->postprice($request);

        return redirect()->back();
    }
}
