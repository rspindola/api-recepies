<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'image', 'slug', 'ingredients'];

    protected $casts = [
        'ingredients' => 'array',
    ];

    /**
     * Recipe belongsTo Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
