<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'uadx';

    protected $fillable = [
        'udx', 'title', 'zipcode', 'address1', 'address2', 'name', 'tel', 'msg', 'slug'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'udx');
    }
}
