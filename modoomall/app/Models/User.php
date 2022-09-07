<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $primaryKey = 'udx';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [    
        'email',
        'password',
        'name',
        'email_auth',
        'cell',
        'cell_auth',
        'tel',
        'join_from',
        'state',
        'slug',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'cell_authed_at' => 'datetime',
    ];

    public function store(){
        return $this->hasOne(Store::class, 'udx');
    }

    public function userAddresses(){
        return $this->hasMany(UserAddress::class, 'udx');
    }

    public function userPayments(){
        return $this->hasMany(UserPayment::class, 'udx');
    }
}
