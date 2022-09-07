<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'pcdx';

    protected $fillable = [
        'group_id', 'category_name', 'category_detail_name', 'category_id', 'category_parent_id', 'state', 'slug'
    ];

    public function products(){
        return $this->hasMany(Product::class, 'pcdx');
    }
}
