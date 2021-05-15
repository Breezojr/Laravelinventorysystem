<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    protected $fillable = [
    'category_id',
    'order_quantity',
    'list_price'
    ];
    public $timestamps = false;
}
