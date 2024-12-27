<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'Category_ID', 'ID');
    }
    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'Products_ID', 'ID');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'User_ID', 'ID');
    }
    public function comment()
    {
        return $this->hasMany(Product::class, 'product_ID', 'ID');
    }

}
