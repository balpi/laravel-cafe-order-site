<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    /** @use HasFactory<\Database\Factories\CommentsFactory> */
    use HasFactory;

    protected $fillable = [
        'comment',
        'rate',
        'product_ID',
        'user_ID',
        'ip',
        'Status',
        'updated_at',
        'created_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_ID', 'ID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'product_ID', 'ID');
    }
}
