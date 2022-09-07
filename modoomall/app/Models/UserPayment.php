<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'updx';

    protected $fillable = [
        'udx', 'payment_type', 'provider', 'account_no', 'expiry', 'slug'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'udx');
    }
}
