<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    protected $fillable = [
        'Title',
        'Keywords',
        'Description',
        'maincategories_ID',
        'Image',
        'Status',
        'updated_at',
        'created_at'
    ];
}
