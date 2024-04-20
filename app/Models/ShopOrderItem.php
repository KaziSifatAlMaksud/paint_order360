<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopOrderItem extends Model
{
    use HasFactory;

    protected $table = 'shop_order_item';

    protected $fillable = [
        'print_order_id',
        'size',
        'amount',
        'product',
        'color',
        'sheen',
        'brand_id',
        'notes',
        'area',
        'shop_id',
        'status'
    ];

    public function printOrder()
    {
        return $this->belongsTo(PrintOrder::class, 'print_order_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
}
