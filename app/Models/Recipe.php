<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Recipe extends Model
{
    use HasSlug;

    protected $fillable = ['category_id', 'name', 'description', 'image', 'slug', 'ingredients'];

    protected $hidden = [
        'image'
    ];

    protected $appends = [
        'image_url'
    ];

    protected $casts = [
        'ingredients' => 'array',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getImageURLAttribute()
    {
        return asset('storage/' . $this->attributes['image']);
    }

    /**
     * Recipe belongsTo Category
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Recipe belongsTo Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
