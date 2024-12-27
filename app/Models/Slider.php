<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /** @use HasFactory<\Database\Factories\SliderFactory> */
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
