<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'content',
        'price',
        'price_sale',
        'menu_id',
        'active',
        'thumb',
        'size'
    ];


    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')
        ->withDefault(['name'=>'']);
    }

    public function orders()
    {
        return $this->belongsToMany(Orders::class, 'Order_detail', 'product_id', 'order_id');
    }
}
