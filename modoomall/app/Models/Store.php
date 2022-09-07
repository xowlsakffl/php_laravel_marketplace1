<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'sdx';

    protected $fillable = [
        'udx', 'store_email', 'store_name', 'store_tel', 'state', 'slug'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'udx');
    }

    public function products(){
        return $this->hasMany(Product::class, 'sdx');
    }
}
