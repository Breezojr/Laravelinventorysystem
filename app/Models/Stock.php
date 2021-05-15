<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory; 
    protected $fillable = [
        'store_id',
        'product_id',
        'quantity'
    ];
    public $timestamps = true;
}
