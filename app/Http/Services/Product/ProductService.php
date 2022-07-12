<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;

class ProductService

{
    const LIMIT = 16;

    public function show($page = null)
    {
        return Product::select('id', 'name', 'price', 'price_sale','thumb')
        ->where('active', 1)
        ->orderByDesc('id')
        ->when($page != null, function ($query) use ($page)
        {
            $query->offset($page * self::LIMIT);
        } )
        ->limit(self::LIMIT)
        ->get();
    }
    public function getProduct($product_id)
    {
        return Product::where('id', $product_id)
        ->get();
    }
    public function countProduct()
    {
        return Product::where('active', 1)
        ->count();
    }
}
