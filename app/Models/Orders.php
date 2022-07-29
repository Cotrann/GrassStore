<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_note',
        'name',
        'email',
        'address',
        'phone',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(App\Models\User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'Order_detail', 'order_id', 'product_id')
        ->withPivot('quantity','price','size');
    }
}
