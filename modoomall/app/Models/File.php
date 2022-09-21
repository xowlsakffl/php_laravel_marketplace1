<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $primaryKey = 'fdx';

    protected $fillable = [
        'pdx', 'udx', 'up_name', 'real_name', 'size', 'extension', 'download', 'width', 'height', 'state', 
    ];

    public function user(){
        return $this->belongsTo(User::class, 'udx');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'pdx');
    }
}
