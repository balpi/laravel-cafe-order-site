<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /** @use HasFactory<\Database\Factories\OrdersFactory> */
    use HasFactory;
    protected $fillable = [
        'User_ID',
        'TableNo',
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
    public function Orders_Product()
    {
        return $this->hasMany(Orders_Product::class, 'Order_ID', 'ID');
    }
}
