<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function category(): HasMany
    {
        return $this->hasMany(Category::class, 'maincategories_ID', 'ID');

    }
}
