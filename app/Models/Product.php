<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = [
        'Title',
        'Keywords',
        'Description',
        'Detail',
        'User_ID',
        'Category_ID',
        'Price',
        'Image',
        'Status',
        'updated_at',
        'created_at'
    ];
}
