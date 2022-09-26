<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ProductCategory extends Model
{
    use HasFactory, HasSlug;

    protected $primaryKey = 'pcdx';

    protected $fillable = [
        'group_id', 'category_name', 'category_detail_name', 'category_id', 'category_parent_id', 'state', 'slug'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('category_name')
            ->saveSlugsTo('slug')
            ->usingLanguage('ko');
    }

    public function products(){
        return $this->hasMany(Product::class, 'pcdx');
    }
}
