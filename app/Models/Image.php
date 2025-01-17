<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;

    protected $fillable = [
        'Title',
        'Image',
        'Products_ID',
        'updated_at',
        'created_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'Products_ID', 'ID');
    }
}
