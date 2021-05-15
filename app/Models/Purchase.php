<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'customer_id',
        'purchase_status',
        'purchase_date',
        'amount',
        'price'


    ];
    public $timestamps = true;
}
