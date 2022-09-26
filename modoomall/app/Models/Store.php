<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Store extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $primaryKey = 'sdx';

    protected $fillable = [
        'udx', 'store_email', 'store_name', 'store_tel', 'state', 'slug'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('store_name')
            ->saveSlugsTo('slug')
            ->usingLanguage('ko');
    }

    public function user(){
        return $this->belongsTo(User::class, 'udx');
    }

    public function products(){
        return $this->hasMany(Product::class, 'sdx');
    }
}
