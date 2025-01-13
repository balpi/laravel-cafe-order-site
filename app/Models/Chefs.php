<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chefs extends Model
{
    /** @use HasFactory<\Database\Factories\ChefsFactory> */
    use HasFactory;
    protected $fillable = [

        'Title',
        'Description',
        'Product_ID',
        'updated_at',
        'created_at'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'Product_ID', 'ID');
    }
}
