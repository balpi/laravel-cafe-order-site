<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maincategory extends Model
{
    /** @use HasFactory<\Database\Factories\MaincategoryFactory> */
    use HasFactory;
    protected $fillable = [
        'Title',
        'Description',
        'updated_at',
        'created_at'
    ];

    public function category()
    {
        return $this->hasMany(Category::class, 'ID', 'maincategories_ID');

    }
}
