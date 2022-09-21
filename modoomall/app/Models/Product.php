<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'pdx';

    protected $fillable = [
        'pcdx', 'sdx', 'sequence', 'title', 'name', 'price', 'quantity', 'content', 'price_normal', 'delivery_origin_cost', 'supply', 'state', 'hit', 'slug'
    ];

    public function store(){
        return $this->belongsTo(Store::class, 'sdx');
    }

    public function categories(){
        return $this->belongsTo(ProductCategory::class, 'pcdx');
    }

    public function files(){
        return $this->hasMany(File::class, 'pdx');
    }
}
