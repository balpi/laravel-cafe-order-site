<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_Product extends Model
{
    /** @use HasFactory<\Database\Factories\OrdersProductFactory> */
    use HasFactory;
    protected $fillable = [
        'User_ID',
        'Product_ID',
        'Order_ID',
        'Price',
        'Amount',
        'Total',
        'Status',
        'Note',
        'IP',
        'created_at',
        'updated_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'User_ID', 'ID');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'Product_ID', 'ID');
    }
    public function orders()
    {
        return $this->belongsTo(Orders::class, 'Order_ID', 'ID');
    }
}
